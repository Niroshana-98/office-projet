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

// Count rows where app_status = 100 (new applications)
$newAppQuery = "SELECT COUNT(*) AS count FROM application WHERE app_status = 100";
$newAppResult = $conn->query($newAppQuery);

if ($newAppResult) {
    $row = $newAppResult->fetch_assoc();
    $newAppCount = $row['count'] ?? 0;
    $response['new_applications'] = $newAppCount;
} else {
    $response['error'][] = "Error fetching new applications: " . $conn->error;
}

// Count rows where app_status IN (200) (approved applications)
$approvedAppQuery = "SELECT COUNT(*) AS count FROM application WHERE app_status IN (200)";
$approvedAppResult = $conn->query($approvedAppQuery);

if ($approvedAppResult) {
    $row = $approvedAppResult->fetch_assoc();
    $approvedAppCount = $row['count'] ?? 0;
    $response['approved_applications'] = $approvedAppCount;
} else {
    $response['error'][] = "Error fetching approved applications: " . $conn->error;
}

// Count rows where app_status IN (110, 2) (rejected applications)
$rejectedAppQuery = "
    SELECT COUNT(*) AS count 
    FROM application 
    WHERE app_status IN (111)
";
$rejectedAppResult = $conn->query($rejectedAppQuery);
$row = $rejectedAppResult->fetch_assoc();
$rejectedAppCount = $row['count'] ?? 0;

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
$response['rejected_applications'] = $rejectedAppCount + $rejectedAppCountCWP;


// Return the response as JSON
echo json_encode($response);
?>
