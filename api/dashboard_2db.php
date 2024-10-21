<?php
session_start();
require 'connect.php';

// Check if the user is logged in
if (!isset($_SESSION['nic'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

// Fetch user data based on NIC
$nic = $_SESSION['nic'];
$stmt = $conn->prepare("SELECT service, grade, position FROM users WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$result = $stmt->get_result(); 

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode([
        'service' => $user['service'],
        'grade' => $user['grade'],
        'position' => $user['position']
    ]);
} else {
    echo json_encode(['error' => 'No user data found']);
}

$stmt->close();
$conn->close();
?>
