<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // FETCH DATA LOGIC
    if (!isset($_SESSION['nic'])) {
        echo json_encode(['error' => 'User not logged in']);
        exit();
    }

    $nic = $_SESSION['nic'];

    // Fetch user data based on NIC
    $stmt = $conn->prepare("SELECT service, grade, desi FROM users WHERE nic = ?");
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo json_encode(['error' => 'No user data found']);
        exit();
    }
    $stmt->close();

    // Fetch ministries from the ministry table
    $ministry_stmt = $conn->prepare("SELECT min_id, min_name FROM ministry");
    $ministry_stmt->execute();
    $ministries_result = $ministry_stmt->get_result();

    $ministries = [];
    if ($ministries_result->num_rows > 0) {
        while ($row = $ministries_result->fetch_assoc()) {
            $ministries[] = $row;
        }
    }
    $ministry_stmt->close();

    // Convert both user data and ministries to JSON format
    header('Content-Type: application/json');
    echo json_encode([
        'user' => $userData,
        'ministries' => $ministries
    ]);

}elseif{

}

$conn->close(); 
?>
