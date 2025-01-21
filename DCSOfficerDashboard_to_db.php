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

// Count rows where app_status (new applications)
$newAppQuery = "SELECT COUNT(*) AS count FROM application WHERE app_status IN (220, 221)";
$newAppResult = $conn->query($newAppQuery);

if ($newAppResult) {
    $row = $newAppResult->fetch_assoc();
    $newAppCount = $row['count'] ?? 0;
    $response['new_applications'] = $newAppCount;
} else {
    $response['error'][] = "Error fetching new applications: " . $conn->error;
}

// Count rows where app_status (approved applications)
$approvedAppQuery = "SELECT COUNT(*) AS count FROM application WHERE app_status IN (
         230, 231, 240, 241, 250, 260)";
$approvedAppResult = $conn->query($approvedAppQuery);

if ($approvedAppResult) {
    $row = $approvedAppResult->fetch_assoc();
    $approvedAppCount = $row['count'] ?? 0;
    $response['approved_applications'] = $approvedAppCount;
} else {
    $response['error'][] = "Error fetching approved applications: " . $conn->error;
}

// Count rows where app_status (rejected applications)
$rejectedAppQuery = "SELECT COUNT(*) AS count FROM application WHERE app_status IN (211)";
$rejectedAppResult = $conn->query($rejectedAppQuery);

if ($rejectedAppResult) {
    $row = $rejectedAppResult->fetch_assoc();
    $rejectedAppCount = $row['count'] ?? 0;
    $response['rejected_applications'] = $rejectedAppCount;
} else {
    $response['error'][] = "Error fetching rejected applications: " . $conn->error;
}

// Return the response as JSON
echo json_encode($response);
?>
