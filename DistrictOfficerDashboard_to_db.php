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
$officeQuery = "SELECT dist_offi_id FROM office WHERE offi_id = ?";
$officeStmt = $conn->prepare($officeQuery);
$officeStmt->bind_param('i', $userOffiId);
$officeStmt->execute();
$officeStmt->bind_result($distOffiId);
$officeStmt->fetch();
$officeStmt->close();

if (!$distOffiId) {
    echo json_encode(["success" => false, "error" => "District office ID not found"]);
    exit;
}

// Initialize counts
$newAppCount = $approvedAppCount = $rejectedAppCount = 0;

// Count rows where app_status = 130, 131 (new applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE dist_offi_id = ? 
    AND app_status IN (130, 131)
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $distOffiId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();
$response['new_applications'] = $newAppCount;


// Count rows where app_status (approved applications)
$approvedAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE dist_offi_id = ?  
    AND application.app_status IN (100, 110, 111, 120, 121, 200)
";

$approvedAppStmt = $conn->prepare($approvedAppQuery);
$approvedAppStmt->bind_param('i', $distOffiId);
$approvedAppStmt->execute();
$approvedAppStmt->bind_result($approvedAppCount);
$approvedAppStmt->fetch();
$approvedAppStmt->close();
$response['approved_applications'] = $approvedAppCount;

// Count rows where app_status = 141, 3 (rejected applications)
$newAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE dist_offi_id = ? 
    AND application.app_status IN (141)
";

$newAppStmt = $conn->prepare($newAppQuery);
$newAppStmt->bind_param('i', $distOffiId);
$newAppStmt->execute();
$newAppStmt->bind_result($newAppCount);
$newAppStmt->fetch();
$newAppStmt->close();

// Count rows where app_status = 3 and c_w_p matches the logged-in user's offi_id
$rejectedAppQueryCWP = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE c_w_p = ? 
    AND app_status = 3
";

$rejectedAppStmtCWP = $conn->prepare($rejectedAppQueryCWP);
$rejectedAppStmtCWP->bind_param('i', $userOffiId);
$rejectedAppStmtCWP->execute();
$rejectedAppStmtCWP->bind_result($rejectedAppCountCWP);
$rejectedAppStmtCWP->fetch();
$rejectedAppStmtCWP->close();

// Combine both counts for rejected applications
$response['rejected_applications'] = $newAppCount + $rejectedAppCountCWP;

// Return the response as JSON
echo json_encode($response);
?>
