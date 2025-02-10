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
$totalCSOffiCount = 0;

$csOffiCountQuery = "
    SELECT COUNT(*) AS count 
    FROM users
    WHERE users.offi_id = ? 
    AND users.status IN (62, 66, 70, 74, 78, 82, 86) 
";

$csOffiCountStmt = $conn->prepare($csOffiCountQuery);
$csOffiCountStmt->bind_param('i', $userOffiId);
$csOffiCountStmt->execute();
$csOffiCountStmt->bind_result($totalCSOffiCount);
$csOffiCountStmt->fetch();
$csOffiCountStmt->close();
$response['officers_count'] = $totalCSOffiCount;




// Return the response as JSON
echo json_encode($response);
?>
