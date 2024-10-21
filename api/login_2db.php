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

        if ($user['password'] === md5($password)) {
            // Start session for the logged-in user
            session_start();
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['username'] = $user['name'];
            $_SESSION['nic'] = $user['nic'];

            header("Location: ../loading.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = '../index.html';</script>";
            exit();
        }
    } else {
        // No user found with the provided username (email or NIC)
        echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = '../index.html';</script>";
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
