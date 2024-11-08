<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['app_no']) || !isset($data['status'])) {
    echo json_encode(['success' => false, 'error' => 'Missing application number or status']);
    exit;
}

$app_no = $data['app_no'];
$status = $data['status'];

$stmt = $conn->prepare("UPDATE application SET app_status = ? WHERE app_no = ?");
$stmt->bind_param("is", $status, $app_no);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Application status updated successfully']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to update application status']);
}

$stmt->close();
?>
