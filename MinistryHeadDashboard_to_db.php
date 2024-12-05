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
    echo json_encode(["success" => false, "error" => "User Ministry ID not found"]);
    exit;
}

// Fetch the dist_offi_id from the office table
$officeQuery = "SELECT min_id FROM office WHERE offi_id = ?";
$officeStmt = $conn->prepare($officeQuery);
$officeStmt->bind_param('i', $userOffiId);
$officeStmt->execute();
$officeStmt->bind_result($minId);
$officeStmt->fetch();
$officeStmt->close();

if (!$minId) {
    echo json_encode(["success" => false, "error" => "Ministry ID not found"]);
    exit;
}

// Initialize counts
$newAppCount = $approvedAppCount = $rejectedAppCount = 0;

// Count rows where app_status = 110 (new applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE min_id = ? 
    AND app_status = 110
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $minId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['new_applications'] = $newAppCount;


// Count rows where app_status = 100 (approved applications)
$approvedAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE min_id = ?  
    AND application.app_status IN (100, 200)
";

$approvedAppStmt = $conn->prepare($approvedAppQuery);
$approvedAppStmt->bind_param('i', $minId);
$approvedAppStmt->execute();
$approvedAppStmt->bind_result($approvedAppCount);
$approvedAppStmt->fetch();
$approvedAppStmt->close();
$response['approved_applications'] = $approvedAppCount;

// Count rows where app_status = 100 (rejected applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE min_id = ? 
    AND application.app_status IN (120, 2)
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $minId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['rejected_applications'] = $newAppCount;

// Return the response as JSON
echo json_encode($response);
?>
