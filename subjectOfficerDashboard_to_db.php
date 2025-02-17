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
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    INNER JOIN desi 
    ON application.desi = desi.desi_id
    WHERE application.c_w_p = ? 
    AND application.app_status IN (2, 3)
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $userOffiId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['new_applications'] = $newAppCount;


// Count rows where app_status = 3 (approved applications) 
$approvedAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    INNER JOIN desi 
    ON application.desi = desi.desi_id
    INNER JOIN users 
    ON application.nic = users.nic
    WHERE application.c_w_p = ? 
    AND application.app_status IN (100, 101, 110, 111, 114, 115,118, 119, 120, 121, 124, 125, 128, 129
        , 130, 131, 134, 135, 138, 139, 140, 141, 144, 145, 150, 151, 154, 155, 200, 201, 210, 211, 220, 221
        , 230, 231, 240, 241, 250, 260)
    AND users.status NOT IN (10, 18, 22, 26, 30, 34, 38, 42, 46, 50, 54, 58, 62, 66, 70, 74, 78, 82, 86)
";

$approvedAppStmt = $conn->prepare($approvedAppQuery);
$approvedAppStmt->bind_param('i', $userOffiId);
$approvedAppStmt->execute();
$approvedAppStmt->bind_result($approvedAppCount);
$approvedAppStmt->fetch();
$approvedAppStmt->close();
$response['approved_applications'] = $approvedAppCount;

// Count rows where app_status = 4 (rejected applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    INNER JOIN desi 
    ON application.desi = desi.desi_id
    WHERE application.c_w_p = ? 
    AND application.app_status = 4
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $userOffiId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['rejected_applications'] = $newAppCount;

// Return the response as JSON
echo json_encode($response);
?>
