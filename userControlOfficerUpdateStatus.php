<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

// Check if NIC is provided
if (!isset($_POST['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not provided']);
    exit;
}

$nic = $_POST['nic'];

// Check if the user has an application in the application table
$stmt = $conn->prepare("SELECT app_status FROM application WHERE nic = ?");
$stmt->bind_param("i", $nic);
$stmt->execute();
$stmt->bind_result($app_status);

if ($stmt->fetch()) {
    // Application exists, determine the user status
    if ($app_status == 1) {
        $new_status = 3; // Pending
    } elseif ($app_status == 2) {
        $new_status = 4; // Submit
    } elseif ($app_status == 4) {
        $new_status = 5; // Rejected
    } else {
        $new_status = 4; 
    }
} else {
    // No application found, set user status to 2
    $new_status = 2;
}
$stmt->close();

// Update user status if necessary
if ($new_status !== null) {
    $update_stmt = $conn->prepare("UPDATE users SET status = ? WHERE nic = ?");
    $update_stmt->bind_param("is", $new_status, $nic);
    if ($update_stmt->execute()) {
        echo json_encode(['success' => true, 'new_status' => $new_status]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update status']);
    }
    $update_stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid application status']);
}

$conn->close();
?>
