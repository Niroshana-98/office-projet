<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if ($appNo === null) {
    echo json_encode(['success' => false, 'error' => 'Application number not found for the given NIC']);
    exit;
}

$uploadDirs = [
    'up_porva_anu' => 'uploads/up_porva_anu/',
    'up_service_minite' => 'uploads/up_service_minite/',
    'up_app_letter_confirm' => 'uploads/up_app_letter_confirm/',
    'up_attach_sp' => 'uploads/up_attach_sp/',
    'up_course_selected' => 'uploads/up_course_selected/',
    'up_campus_confirm' => 'uploads/up_campus_confirm/',
    'up_course_complete' => 'uploads/up_course_complete/',
    'up_pay_recept' => 'uploads/up_pay_recept/',
    'up_other' => 'uploads/up_other/'
];

$fileKey = key($_FILES);

if (!array_key_exists($fileKey, $uploadDirs)) {
    echo json_encode(['success' => false, 'error' => 'Invalid file upload key']);
    exit;
}

if (!isset($_FILES[$fileKey])) {
    echo json_encode(['success' => false, 'error' => 'No file uploaded']);
    exit;
}

$file = $_FILES[$fileKey];

// Validate file type
$fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
$allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];

if (!in_array($file['type'], $allowedTypes)) {
    echo json_encode(['success' => false, 'error' => 'Invalid file type']);
    exit;
}

$newFileName = "{$fileKey}_$appNo.$fileExtension";
$filePath = $uploadDirs[$fileKey] . $newFileName;

if (!move_uploaded_file($file['tmp_name'], $filePath)) {
    echo json_encode(['success' => false, 'error' => 'File upload failed: ' . error_get_last()['message']]);
    exit;
}

// Update database with file path
$stmt = $conn->prepare("UPDATE application SET $fileKey = ? WHERE app_no = ?");
$stmt->bind_param("ss", $filePath, $appNo);
$stmt->execute();
$stmt->close();

echo json_encode(['success' => true, 'filePath' => $filePath]);

?>
