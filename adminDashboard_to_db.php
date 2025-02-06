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
$totalOffiHeadCount = $totalUserCount = 0;

$officeHeadCountQuery = "
    SELECT COUNT(*) AS count 
    FROM users
    WHERE users.status IN (19, 20, 21, 22, 31, 32, 33, 34, 43, 44, 45, 46, 55, 56, 57, 58,
    59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82,
    83, 84, 85, 86)
";

$officeHeadCountStmt = $conn->prepare($officeHeadCountQuery);
if (!$officeHeadCountStmt) {
    echo json_encode(["success" => false, "error" => "Query preparation failed: " . $conn->error]);
    exit;
}

$officeHeadCountStmt->execute();
$officeHeadCountStmt->bind_result($totalOffiHeadCount);
$officeHeadCountStmt->fetch();
$officeHeadCountStmt->close();

$response['total_officeHeads'] = $totalOffiHeadCount;


$usersCountQuery = "
    SELECT COUNT(*) AS count 
    FROM users
    WHERE users.status IN (2, 3, 4, 5, 10, 18, 26, 30, 38, 42, 50, 54)
";

$usersCountStmt = $conn->prepare($usersCountQuery);
if (!$usersCountStmt) {
    echo json_encode(["success" => false, "error" => "Query preparation failed: " . $conn->error]);
    exit;
}

$usersCountStmt->execute();
$usersCountStmt->bind_result($totalUserCount);
$usersCountStmt->fetch();
$usersCountStmt->close();

$response['total_users'] = $totalUserCount;


// Return the response as JSON
echo json_encode($response);
?>
