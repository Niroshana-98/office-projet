<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');  

if (!isset($_SESSION['app_no'])) {
    echo json_encode(['success' => false, 'error' => 'Application number not found in session']);
    exit;
}

$app_no = $_SESSION['app_no'];

// Handle GET request to fetch `reason`
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->prepare("SELECT reason FROM application WHERE app_no = ?");
    $stmt->bind_param("s", $app_no);
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
