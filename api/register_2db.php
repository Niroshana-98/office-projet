<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $service = $_POST['service'];
    $grade = $_POST['grade'];
    $position = $_POST['position'];
    $password = $_POST['inputPassword'];
    $confirm_password = $_POST['inputConfirmPassword'];

    // Convert password to MD5
    $hashed_password = md5($password);

    // Check for existing user
    $stmt = $conn->prepare("SELECT * FROM users WHERE nic=? OR email=?");
    $stmt->bind_param("ss", $nic, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('A user with this NIC or email already exists.');</script>";
    } else {
        // Prepare statement for insertion
        $stmt = $conn->prepare("INSERT INTO users (name, nic, email, tel, service, grade, position, password) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $nic, $email, $tel, $service, $grade, $position, $hashed_password);

        if ($stmt->execute()) {
            // Successful registration
            echo "<script>alert('Registration Successfully!'); window.location.href = '../index.html';</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
    }

    $stmt->close();
}

$conn->close();
?>
