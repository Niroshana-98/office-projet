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

$stmt = $conn->prepare("SELECT app_no, name_si, name_full, name_eng, nic, address_pri, tel_land, tel_mob, email_pri FROM application WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($appNo, $nameSi, $nameFull, $nameEng, $nic, $addressPri, $telLand, $telMob, $emailPri);
$stmt->fetch();
$stmt->close();

if ($appNo) {
    echo json_encode([
        'success' => true,
        'app_no' => $appNo,
        'name_si' => $nameSi,
        'name_full' => $nameFull,
        'name_eng' => $nameEng,
        'nic' => $nic,
        'address_pri' => $addressPri,
        'tel_land' => $telLand,
        'tel_mob' => $telMob,
        'email_pri' => $emailPri,
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}
?>
