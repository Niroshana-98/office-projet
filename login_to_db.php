<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username is an email or NIC, and fetch user details
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR nic = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any user exists with the given username (email or NIC)
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Hash the password input and compare it with the stored hashed password
        if ($user['password'] === md5($password)) {

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['nic'] = $user['nic'];

            // Check the user's status and redirect
            if ($user['status'] == 1) {
                header("Location: ./otp.php?email=" . urlencode($user['email']));
                exit();
            } elseif ($user['status'] == 2) {
                header("Location: ./dashboard.php");
                exit();
            } elseif ($user['status'] == 3) {
                header("Location: ./upload.php");
                exit();
            }elseif ($user['status'] == 4) {
                header("Location: ./applicationView.php");
                exit();
            }elseif ($user['status'] == 11) {
                header("Location: ./subjectOfficer.php");
                exit();
            } else {
                echo "<script>alert('Invalid user status'); window.location.href = './index.html';</script>";
            }

        } else {
            // Incorrect password
            echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = './index.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = './index.html';</script>";
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
