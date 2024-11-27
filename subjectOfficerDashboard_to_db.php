<?php
require 'connect.php'; 
session_start();

header('Content-Type: application/json'); // Ensure proper JSON header

$response = ["success" => true];

// Check if the user is logged in
if (!isset($_SESSION['nic'])) {
    echo json_encode(["success" => false, "error" => "User not logged in"]);
    exit;
}

$userNic = $_SESSION['nic'];

// Fetch the logged-in user's offi_id
$userQuery = "SELECT offi_id FROM users WHERE nic = ?";
$userStmt = $conn->prepare($userQuery);
$userStmt->bind_param('s', $userNic);
$userStmt->execute();
$userStmt->bind_result($userOffiId);
$userStmt->fetch();
$userStmt->close();

if (!$userOffiId) {
    echo json_encode(["success" => false, "error" => "User office ID not found"]);
    exit;
}

// Initialize counts
$newAppCount = $approvedAppCount = $rejectedAppCount = 0;

// Count rows where app_status = 2 (new applications)
$newAppQuery = "SELECT COUNT(*) AS count FROM application WHERE c_w_p = ? AND app_status = 2";
$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $userOffiId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['new_applications'] = $newAppCount;

// Count rows where app_status = 3 (approved applications)
$approvedAppQuery = "SELECT COUNT(*) AS count FROM application WHERE c_w_p = ? AND app_status = 3";
$approvedAppStmt = $conn->prepare($approvedAppQuery);
$approvedAppStmt->bind_param('i', $userOffiId);
$approvedAppStmt->execute();
$approvedAppStmt->bind_result($approvedAppCount);
$approvedAppStmt->fetch();
$approvedAppStmt->close();
$response['approved_applications'] = $approvedAppCount;

// Count rows where app_status = 4 (rejected applications)
$rejectedAppQuery = "SELECT COUNT(*) AS count FROM application WHERE c_w_p = ? AND app_status = 4";
$rejectedAppStmt = $conn->prepare($rejectedAppQuery);
$rejectedAppStmt->bind_param('i', $userOffiId);
$rejectedAppStmt->execute();
$rejectedAppStmt->bind_result($rejectedAppCount);
$rejectedAppStmt->fetch();
$rejectedAppStmt->close();
$response['rejected_applications'] = $rejectedAppCount;

// Return the response as JSON
echo json_encode($response);
?>
