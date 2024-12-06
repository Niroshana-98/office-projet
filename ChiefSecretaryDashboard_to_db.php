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
$rejectedAppQuery = "SELECT COUNT(*) AS count FROM application WHERE app_status IN (110, 2)";
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
