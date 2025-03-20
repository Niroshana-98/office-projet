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

// Handle GET request to fetch `reason`
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->prepare("SELECT reason FROM application WHERE nic = ?");
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $stmt->bind_result($reason);
    $stmt->fetch();
    $stmt->close();

    if ($reason !== null) {
        echo json_encode(['success' => true, 'reason' => (int)$reason]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Reason not found']);
    }
    exit;
}

// Handle file upload (existing POST request handling)
// Your existing file upload code here...

$conn->close();
?>
