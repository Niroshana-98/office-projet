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

// Fetch the dist_offi_id from the office table
$officeQuery = "SELECT min_id FROM office WHERE offi_id = ?";
$officeStmt = $conn->prepare($officeQuery);
$officeStmt->bind_param('i', $userOffiId);
$officeStmt->execute();
$officeStmt->bind_result($minId);
$officeStmt->fetch();
$officeStmt->close();

if (!$minId) {
    echo json_encode(["success" => false, "error" => "District office ID not found"]);
    exit;
}

// Initialize counts
$newAppCount = $approvedAppCount = $rejectedAppCount = 0; 

// Count rows where app_status (new applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE min_id = ? 
    AND app_status IN (118, 119) 
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $minId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['new_applications'] = $newAppCount;


// Count rows where app_status (approved applications)
$approvedAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application
    WHERE application.min_id = ? 
    AND application.app_status IN (100, 101
        , 200, 201, 210, 211, 220, 221
        , 230, 231, 240, 241, 250, 260)
";

$approvedAppStmt = $conn->prepare($approvedAppQuery);
$approvedAppStmt->bind_param('i', $minId); 
$approvedAppStmt->execute();
$approvedAppStmt->bind_result($approvedAppCount);
$approvedAppStmt->fetch();
$approvedAppStmt->close();
$response['approved_applications'] = $approvedAppCount;

// Count rows where app_status (rejected applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    INNER JOIN desi 
    ON application.desi = desi.desi_id
    WHERE application.min_id = ? 
    AND application.app_status IN (111)
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
