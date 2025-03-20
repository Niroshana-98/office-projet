<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['user_id']) || !isset($data['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized request']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Update status and clear temp_status
$stmt = $conn->prepare("
    UPDATE users 
    SET status = temp_status, temp_status = NULL 
    WHERE user_id = ?
");

$stmt->bind_param("s", $user_id);
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}
$stmt->close();
?>
