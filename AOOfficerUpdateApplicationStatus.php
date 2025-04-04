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
$recommendation = isset($data['AO_Recommend']) ? $data['AO_Recommend'] : '';

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


// Handle application approval
if ($status == 1) {
    
    // Set app_status based on offi_cat
    $app_status = 210; 
    

    // Update the application status
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, AO_Recommend = ?, AO_Aprv_RM = ?, AO_time_stamp = NOW(), AO_user_id = ?, ACS_Reject_RM = NULL WHERE app_no = ?");
    $stmt->bind_param("iisis", $app_status, $recommendation, $comment, $user_id, $app_no);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Application approved successfully', 'new_status' => $app_status]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update application status']);
    }

    $stmt->close();
    exit;
}

// Handle application rejection
if ($status == 2 && !empty($comment)) {
    // Update application status and rejection reason

    // Set app_status based on offi_cat
    $status = 101;
    
    
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, AO_Reject_RM = ?, AO_time_stamp = NOW(), AO_user_id = ?, ACS_Reject_RM = NULL  WHERE app_no = ?");
    $stmt->bind_param("isis", $status, $comment, $user_id, $app_no);

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
