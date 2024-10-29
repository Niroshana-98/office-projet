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

// Fetch the file paths from the database
$stmt = $conn->prepare("SELECT up_porva_anu, up_service_minite, up_app_letter_confirm, up_attach_sp,up_course_selected, up_campus_confirm, up_course_complete, up_pay_recept, up_other FROM application WHERE nic = ?");
$stmt->bind_param("s", $userId);
$stmt->execute();
$stmt->bind_result($filePath1, $filePath2, $filePath3, $filePath4,$filePath5,$filePath6,$filePath7,$filePath8,$filePath9);
$stmt->fetch();
$stmt->close();

$response = [
    'success' => true,
    'filePath1' => $filePath1 ? $filePath1 : null,
    'filePath2' => $filePath2 ? $filePath2 : null,
    'filePath3' => $filePath3 ? $filePath3 : null,
    'filePath4' => $filePath4 ? $filePath4 : null,
    'filePath5' => $filePath5 ? $filePath5 : null,
    'filePath6' => $filePath6 ? $filePath6 : null,
    'filePath7' => $filePath7 ? $filePath7 : null,
    'filePath8' => $filePath8 ? $filePath8 : null,
    'filePath9' => $filePath9 ? $filePath9 : null
];

echo json_encode($response);

$conn->close();
?>
