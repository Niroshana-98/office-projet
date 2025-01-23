<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json'); 

if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not found in session']);
    exit;
}

$nic = $_SESSION['nic'];

$stmt = $conn->prepare("
    SELECT
        a.app_no, a.offi_cat, a.app_status
    FROM
        application a
    WHERE
        a.nic = ?"
);

$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($appNo, $offi_cat, $app_status);

$stmt->fetch();
$stmt->close();

if ($appNo) {
    echo json_encode([
        'success' => true, 
        'app_no' => $appNo,
        'offi_cat' => $offi_cat,
        'app_status' => $app_status
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}
?>