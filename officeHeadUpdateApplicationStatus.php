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


if ($status == 1) {
    
    // Set app_status based on offi_cat
    if ($offi_cat == 6) {
        $app_status = 124; 
    } elseif ($offi_cat == 5) {
        $app_status = 134;
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid offi_cat value']);
        exit();
    }

    // Update the application status
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, Office_head_Aprv_RM = ?, Office_head_time_stamp = NOW(), Office_head_user_id = ?, Dist_Chk_Offi_Reject_RM = NULL WHERE app_no = ?");
    $stmt->bind_param("isis", $app_status, $comment, $user_id, $app_no);

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

    // Retrieve the user's NIC from the application table
    $stmt = $conn->prepare("SELECT nic FROM application WHERE app_no = ?");
    $stmt->bind_param("i", $app_no);
    $stmt->execute();
    $stmt->bind_result($user_nic);
    $stmt->fetch();
    $stmt->close();

    if ($user_nic) {
        // Retrieve the user's status from the users table
        $stmt = $conn->prepare("SELECT status FROM users WHERE nic = ?");
        $stmt->bind_param("s", $user_nic);
        $stmt->execute();
        $stmt->bind_result($user_status);
        $stmt->fetch();
        $stmt->close();

        // Set app_status based on conditions
        if ($user_status == 18) {
            $status = 4;  
        } elseif ($offi_cat == 6) {
            $status = 151;
        } elseif ($offi_cat == 5) {
            $status = 141;
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid offi_cat value']);
            exit();
        }

        // Update application status
        $stmt = $conn->prepare("UPDATE application SET app_status = ?, Office_head_Reject_RM = ?, Office_head_time_stamp = NOW(), Office_head_user_id = ?, Dist_Chk_Offi_Reject_RM = NULL WHERE app_no = ?");
        $stmt->bind_param("isis", $status, $comment, $user_id, $app_no);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Application status updated successfully']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update rejection details']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'User NIC not found']);
    }

    exit;
}


echo json_encode(['success' => false, 'error' => 'Invalid status value']);
exit;
?>
