<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['nic'];

// Fetch the file path from the database
$stmt = $conn->prepare("SELECT up_porva_anu FROM application WHERE nic = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($filePath);
$stmt->fetch();
$stmt->close();

if ($filePath) {
    echo json_encode(['success' => true, 'filePath' => $filePath]);
} else {
    echo json_encode(['success' => true, 'filePath' => null]);
}

$conn->close();
?>
