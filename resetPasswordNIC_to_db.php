<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php'; // Ensure this is correct

header('Content-Type: application/json');

if (!isset($_GET['nic']) || empty($_GET['nic'])) {
    echo json_encode(["success" => false, "error" => "NIC not provided"]);
    exit;
}

$nic = $_GET['nic'];

if (!$conn) {
    echo json_encode(["success" => false, "error" => "Database connection failed: " . mysqli_connect_error()]);
    exit;
}

$stmt = $conn->prepare("SELECT name, email FROM users WHERE nic = ?");
if (!$stmt) {
    echo json_encode(["success" => false, "error" => "SQL error: " . $conn->error]);
    exit;
}

$stmt->bind_param("s", $nic);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode(["success" => true, "name" => $user['name'], "email" => $user['email']]);
} else {
    echo json_encode(["success" => false, "error" => "User not found"]);
}

$stmt->close();
$conn->close();
?>
