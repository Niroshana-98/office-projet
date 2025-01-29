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
$totalUserCount = $approvedUserCount = 0;

// Count rows where app_status = 150 (new applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM users
    WHERE users.offi_id = ? 
    AND users.status IN (2, 3, 4) 
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $userOffiId);
$newAppStmt->execute();
$newAppStmt->bind_result($totalUserCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['total_users'] = $totalUserCount;


// Count rows where app_status = 140 (approved applications)
$approvedAppQuery = "
    SELECT COUNT(*) AS count 
    FROM users
    WHERE users.offi_id = ? 
    AND users.status IN (10, 18)
";

$approvedAppStmt = $conn->prepare($approvedAppQuery);
$approvedAppStmt->bind_param('i', $userOffiId);
$approvedAppStmt->execute();
$approvedAppStmt->bind_result($approvedUserCount);
$approvedAppStmt->fetch();
$approvedAppStmt->close();
$response['approved_users'] = $approvedUserCount;

// Return the response as JSON
echo json_encode($response);
?>
