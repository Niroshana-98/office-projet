<?php
session_start();

include('connect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.location.href = 'createNewPassword.php';</script>";
        exit();
    }

    $userEmail = $_SESSION['email']; 

    $hashedPassword = md5($password);

    $sql = "UPDATE users SET password = ? WHERE email = ?"; 

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $hashedPassword, $userEmail); 

        // Execute the query
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Password updated successfully!'); window.location.href = 'index.html';</script>";
            } else {
                echo "<script>alert('No changes made to the password. Please try again.'); window.location.href = 'createNewPassword.php';</script>";
            }
        } else {
            echo "<script>alert('Error updating password: " . $stmt->error . "'); window.location.href = 'createNewPassword.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error preparing query: " . $conn->error . "'); window.location.href = 'createNewPassword.php';</script>";
    }

    $conn->close();
}
?>
