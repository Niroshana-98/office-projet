<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

if (!isset($_POST['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not provided']);
    exit;
}

$nic = $_POST['nic'];

// Get the current status of the user
$get_status_stmt = $conn->prepare("SELECT status FROM users WHERE nic = ?");
$get_status_stmt->bind_param("s", $nic);
$get_status_stmt->execute();
$get_status_stmt->bind_result($current_status);
$get_status_stmt->fetch();
$get_status_stmt->close();

// Store the current status into temp_status before updating
$update_temp_stmt = $conn->prepare("UPDATE users SET temp_status = ? WHERE nic = ?");
$update_temp_stmt->bind_param("is", $current_status, $nic);
$update_temp_stmt->execute();
$update_temp_stmt->close();

// Check application status from the application table
$stmt = $conn->prepare("SELECT app_status FROM application WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($app_status);
$stmt->fetch();
$stmt->close();

// Determine the new status
if ($app_status !== null) {
    if ($app_status == 1) {
        $new_status = 3; 
    } elseif ($app_status == 2) {
        $new_status = 4; 
    } elseif ($app_status == 4) {
        $new_status = 5; 
    } else {
        $new_status = 4;
    }
} else {
    $new_status = 2;
}

// Update the users table with the new status
$update_stmt = $conn->prepare("UPDATE users SET status = ? WHERE nic = ?");
$update_stmt->bind_param("is", $new_status, $nic);
if ($update_stmt->execute()) {
    echo json_encode(['success' => true, 'new_status' => $new_status]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to update status']);
}
$update_stmt->close();

$conn->close();
?>
