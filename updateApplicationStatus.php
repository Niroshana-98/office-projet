<?php
session_start();
require 'connect.php';  // Ensure you are including your DB connection

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

// Check if both app_no and status are set
if (!isset($data['app_no']) || !isset($data['status'])) {
    echo json_encode(['success' => false, 'error' => 'Missing application number or status']);
    exit;
}

$app_no = $data['app_no'];
$status = $data['status'];

// Prepare the SQL query to update the application status
$stmt = $conn->prepare("UPDATE application SET app_status = ? WHERE app_no = ?");
$stmt->bind_param("is", $status, $app_no);

if ($stmt->execute()) {
    // If the update is successful, send a success response
    echo json_encode(['success' => true, 'message' => 'Application status updated successfully']);
} else {
    // If the update fails, send a failure response
    echo json_encode(['success' => false, 'error' => 'Failed to update application status']);
}

$stmt->close();
?>
