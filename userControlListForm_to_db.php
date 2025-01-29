<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json'); 

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User Id number not found in session']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Corrected query to select from users table
$stmt = $conn->prepare("
    SELECT 
        user_id, name, nic, email, tel 
    FROM 
        users 
    WHERE 
        user_id = ?  -- Corrected the condition to refer to user_id
");

$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($user_id, $name, $nic, $email, $tel);
$stmt->fetch();
$stmt->close();

// Check if the user data was fetched
if ($user_id) {
    echo json_encode([
        'success' => true,
        'user_id' => $user_id,
        'name' => $name,
        'nic' => $nic,
        'email' => $email,
        'tel' => $tel
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'User ID number not found']);
}
?>
