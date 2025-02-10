<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User ID not found in session']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user details along with designation and office category
$stmt = $conn->prepare("
    SELECT 
        u.user_id, u.name, u.nic, u.email, u.tel, u.desi, o.offi_cat, u.status
    FROM 
        users u
    LEFT JOIN 
        office o ON u.offi_id = o.offi_id 
    WHERE 
        u.user_id = ?
");

$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($user_id, $name, $nic, $email, $tel, $desi, $offi_cat, $status);
$stmt->fetch();
$stmt->close();


echo json_encode([
    'success' => true,
    'user_id' => $user_id,
    'name' => $name,
    'nic' => $nic,
    'email' => $email,
    'tel' => $tel,
    'desi' => $desi,
    'offi_cat' => $offi_cat,
    'status' => $status
]);
?> 
