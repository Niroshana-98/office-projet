<?php
session_start();
require 'connect.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

header('Content-Type: application/json');

// Read and decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

// Get the NIC from the session
$nic = $_SESSION['nic'];

// Fetch user_id for the logged-in NIC from the users table
$stmt = $conn->prepare("SELECT user_id FROM users WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();

if (!$user_id) {
    echo json_encode(['success' => false, 'error' => 'User not found']);
    exit;
}

// Validate input data
if (!isset($data['app_no']) || !isset($data['status'])) {
    echo json_encode(['success' => false, 'error' => 'Missing application number or status']);
    exit;
} 

$app_no = $data['app_no'];
$status = $data['status'];
$comment = isset($data['comment']) ? $data['comment'] : '';
$nic = isset($data['nic']) ? $data['nic'] : '';

// Handle application approval
if ($status == 1) {

    $status = 100;
    
    // Update the application status
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, Min_head_Aprv_RM = ?, Min_head_time_stamp = NOW(), Min_head_user_id = ? WHERE app_no = ?");
    $stmt->bind_param("isis", $status, $comment, $user_id, $app_no);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Application approved successfully', 'new_status' => $status]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update application status']);
    }

    $stmt->close();
    exit;
}

// Handle application rejection
if ($status == 2 && !empty($comment)) {

    // Fetch offi_cat for the given app_no
    $stmt = $conn->prepare("SELECT offi_cat FROM application WHERE app_no = ?");
    $stmt->bind_param("i", $app_no);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $offi_cat = $row['offi_cat'];
    } else {
        echo json_encode(['success' => false, 'error' => 'Application not found']);
        exit();
    }
    
    $stmt->close();

    // Set app_status based on offi_cat
    if ($offi_cat == 2) {
        $app_status = 2; // Approved status for offi_cat = 2
    } elseif ($offi_cat == 3) {
        $app_status = 120; // Approved status for offi_cat = 3
    } elseif ($offi_cat == 4) {
        $app_status = 120; // Approved status for offi_cat = 4
    }elseif ($offi_cat == 5) {
        $app_status = 120; // Approved status for offi_cat = 5
    }elseif ($offi_cat == 6) {
        $app_status = 120; // Approved status for offi_cat = 6
    }else {
        echo json_encode(['success' => false, 'error' => 'Invalid offi_cat value']);
        exit();
    }
    // Update application status and rejection reason
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, Min_head_Reject_RM = ?, Min_head_time_stamp = NOW(), Min_head_user_id = ? WHERE app_no = ?");
    $stmt->bind_param("isis", $app_status, $comment, $user_id, $app_no);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Application rejected successfully']);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update rejection details']);
    }
    $stmt->close();
    exit;
}

// Default response for invalid status
echo json_encode(['success' => false, 'error' => 'Invalid status value']);
exit;
?>
