<?php
require 'connect.php';
session_start(); 

// Get NIC from session or POST
$nic = isset($_SESSION['nic']) ? $_SESSION['nic'] : (isset($_POST['nic']) ? $_POST['nic'] : null);
$email = isset($_POST['email']) ? $_POST['email'] : null;

if (!$nic && !$email) {
    echo "<script>alert('Email or NIC is required.'); window.history.back();</script>";
    exit;
}

if (!isset($_POST['otp']) || !is_array($_POST['otp'])) {
    echo "<script>alert('Please enter the OTP.'); window.history.back();</script>";
    exit;
}

$entered_otp = implode('', $_POST['otp']); 

$stmt = $conn->prepare("SELECT otp, status FROM users WHERE email=? OR nic=?");
$stmt->bind_param("ss", $email, $nic);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $db_otp = $row['otp'];
    $currentStatus = $row['status']; 

    // Check if OTP matches
    if ($entered_otp == $db_otp) {
        // Status Mapping
        $statusMapping = [
            20 => 21, 32 => 33, 44 => 45, 56 => 57, 
            60 => 61, 64 => 65, 68 => 69, 72 => 73, 
            76 => 77, 80 => 81, 84 => 85
        ];
        $newStatus = $statusMapping[$currentStatus] ?? $currentStatus;

        // Update status
        $stmt = $conn->prepare("UPDATE users SET status=? WHERE email=? OR nic=?");
        $stmt->bind_param("iss", $newStatus, $email, $nic);

        if ($stmt->execute()) {
            echo "<script>alert('OTP Verified! Redirecting to homepage.'); window.location.href = 'index.html';</script>";
            exit;
        } else {
            echo "<script>alert('Error updating the status.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid OTP. Please try again.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('User not found.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
