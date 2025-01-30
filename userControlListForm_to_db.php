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
        u.user_id, u.name, u.nic, u.email, u.tel, d.desi_name, u.desi, o.offi_cat
    FROM 
        users u
    LEFT JOIN 
        desi d ON u.desi = d.desi_id
    LEFT JOIN 
        office o ON u.offi_id = o.offi_id  -- Joining office table to get offi_cat
    WHERE 
        u.user_id = ?
");

$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($user_id, $name, $nic, $email, $tel, $desi_name, $user_desi, $offi_cat);
$stmt->fetch();
$stmt->close();

// Fetch all designations
$desi_stmt = $conn->prepare("SELECT desi_id, desi_name FROM desi");
$desi_stmt->execute();
$desi_result = $desi_stmt->get_result();
$designations = [];

while ($row = $desi_result->fetch_assoc()) {
    $designations[] = $row;
}
$desi_stmt->close();

echo json_encode([
    'success' => true,
    'user_id' => $user_id,
    'name' => $name,
    'nic' => $nic,
    'email' => $email,
    'tel' => $tel,
    'desi_name' => $desi_name,
    'user_desi' => $user_desi,
    'designations' => $designations,
    'offi_cat' => $offi_cat  // Now correctly fetched from office table
]);
?>
