<?php
session_start();
include 'connect.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['nic'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['up_service_minite'])) {
    $file = $_FILES['up_porva_anu'];
    $uploadDir = 'uploads/up_porva_anu/';
    $filePath = $uploadDir . basename($file['name']);

    // Check file type
    $allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];
    if (!in_array($file['type'], $allowedTypes)) {
        echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
        exit;
    }

    // uploaded file
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $stmt = $conn->prepare("UPDATE application SET up_porva_anu = ? WHERE nic = ?");
        $stmt->bind_param("si", $filePath, $userId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'filePath' => $filePath]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Database update failed']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'File move failed']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['up_service_minite'])) {
    $file = $_FILES['up_service_minite'];
    $uploadDir = 'uploads/up_service_minite/';
    $filePath = $uploadDir . basename($file['name']);

    // Check file type
    $allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];
    if (!in_array($file['type'], $allowedTypes)) {
        echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
        exit;
    }

    // uploaded file
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $stmt = $conn->prepare("UPDATE application SET up_porva_anu = ? WHERE nic = ?");
        $stmt->bind_param("si", $filePath, $userId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'filePath' => $filePath]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Database update failed']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'File move failed']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}

$conn->close();
?>
