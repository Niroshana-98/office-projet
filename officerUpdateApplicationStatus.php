<?php
session_start();
require 'connect.php'; 

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['app_no']) || !isset($data['status']) || !isset($data['nic'])) {
    echo json_encode(['success' => false, 'error' => 'Missing application number, status, or NIC']);
    exit;
}

$app_no = $data['app_no'];
$status = $data['status'];
$comment = isset($data['comment']) ? $data['comment'] : ''; 
$nic = $data['nic']; 

if ($status == 6 && !empty($comment)) {
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, rejected = ? WHERE app_no = ?");
    $stmt->bind_param("iss", $status, $comment, $app_no);
} else {
    $stmt = $conn->prepare("UPDATE application SET app_status = ? WHERE app_no = ?");
    $stmt->bind_param("is", $status, $app_no);
}

if ($stmt->execute()) {
    $stmt = $conn->prepare("UPDATE users SET status = 5 WHERE nic = ?");
    $stmt->bind_param("s", $nic); 
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Application and user status updated successfully']);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update user status']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to update application status']);
}

$stmt->close();
?>