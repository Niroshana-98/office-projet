<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

// Check if NIC is provided
if (!isset($_POST['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not provided']);
    exit;
}

$nic = $_POST['nic'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nic = $_POST["nic"];
    $newStatus = $_POST["status"];

    if (!empty($nic) && !empty($newStatus)) {
        $sql = "UPDATE users SET status = ? WHERE nic = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $newStatus, $nic);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Database update failed"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "error" => "Invalid input"]);
    }
}

$conn->close();
?>
