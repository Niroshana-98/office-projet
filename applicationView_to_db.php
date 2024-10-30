<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json'); // Set header to JSON for AJAX response

if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not found in session']);
    exit;
}

$nic = $_SESSION['nic'];
$appNo = null;

$stmt = $conn->prepare("SELECT app_no FROM application WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($appNo);
$stmt->fetch();
$stmt->close();

if ($appNo) {
    echo json_encode(['success' => true, 'app_no' => $appNo]);
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}
?>
