<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Get user's NIC
$stmt = $conn->prepare("SELECT nic FROM users WHERE user_id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($nic);
$stmt->fetch();
$stmt->close();

// Check if the user has an application
$checkStmt = $conn->prepare("SELECT COUNT(*) FROM application WHERE nic = ?");
$checkStmt->bind_param("s", $nic);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();
$checkStmt->close();

if ($count > 0) {
    echo json_encode(['success' => false, 'error' => 'Cannot delete account. Application exists.']);
    exit;
}

// Delete user account
$deleteStmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
$deleteStmt->bind_param("s", $user_id);
if ($deleteStmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to delete account.']);
}
$deleteStmt->close();

$conn->close();
?>
