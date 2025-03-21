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
$stmt = $conn->prepare("SELECT user_id, email FROM users WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($user_id, $user_email);
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
$stmt = $conn->prepare("SELECT offi_cat, email_pri FROM application WHERE app_no = ?"); 
$stmt->bind_param("i", $app_no);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $offi_cat = $row['offi_cat']; 
    $user_email = $row['email_pri'];
} else {
    echo json_encode(['success' => false, 'error' => 'Application not found']);
    exit();
}

$stmt->close();


// Handle application approval 
if ($status == 1) {
    
    // Set app_status based on offi_cat
    $app_status = 240; 
    

    // Update the application status
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, CS_Aprv_RM = ?, CS_time_stamp = NOW(), CS_user_id = ?, ACC1_Reject_RM = NULL WHERE app_no = ?");
    $stmt->bind_param("isis", $app_status, $comment, $user_id, $app_no);

    if ($stmt->execute()) {
        $stmt->close();
        
        // Fetch applicant email and name
        $stmt = $conn->prepare("SELECT name_eng, email_pri FROM application WHERE app_no = ?");
        $stmt->bind_param("s", $app_no);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email_pri'];
            $applicant_name = $row['name_eng'];
        } else {
            echo json_encode(['success' => false, 'error' => 'Applicant email not found']);
            exit;
        }

        if (empty($email)) {
            echo json_encode(['success' => false, 'error' => 'Recipient email is missing']);
            exit;
        }

        // Send approval email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'djpasinduniroshana@gmail.com';
            $mail->Password   = 'wrxb kpcf miir faxi'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('djpasinduniroshana@gmail.com', 'Chief Secretariat Southern Province');
            $mail->addAddress($email);

            // Email Content
            $mail->isHTML(true);
            $mail->Subject = 'Application Approved';
            $mail->Body    = "
                <div style='
                    font-family: Arial, sans-serif; 
                    color: #333; 
                    text-align: center; 
                    max-width: 600px; 
                    margin: auto; 
                    padding: 20px; 
                    border: 1px solid #e0e0e0; 
                    border-radius: 10px; 
                    background: linear-gradient(135deg,rgb(151, 234, 240) 0%,rgb(164, 189, 206) 100%);
                '>
                    <h2 style='
                        color: #ffffff; 
                        font-size: 28px; 
                        font-weight: bold; 
                        text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.4);
                    '>
                        Application Approved
                    </h2>
                    <p style='font-size: 18px; color: #f0f0f0;'>Hello, $applicant_name,</p>
                    <p style='font-size: 16px; color: #f0f0f0;'>
                        Congratulations! Your application has been approved.
                    </p>
                    
                    <div style='
                        font-size: 18px; 
                        color: #ffffff; 
                        font-weight: bold; 
                        padding: 15px; 
                        border: 2px dashed #ffffff; 
                        background-color: rgba(255, 255, 255, 0.2); 
                        border-radius: 10px; 
                        margin: 20px 0; 
                        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
                    '>
                        Your application status is now: <b>Approved</b>
                    </div>
                    
                    <p style='font-size: 16px; color: #f0f0f0;'>
                        If you have any questions, please contact us at [Your Contact Info].
                    </p>
                    
                    <p style='
                        font-size: 14px; 
                        color: #f0f0f0; 
                        margin-top: 20px;
                    '>
                        Best Regards,<br><br>
                        Chief Secretariat Southern Province
                    </p>
                </div>
            ";

            $mail->send();

            echo json_encode(['success' => true, 'message' => 'Application approved and email sent successfully']);
            
        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            echo json_encode(['success' => false, 'error' => 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
            exit;
        }
        exit;

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
    $status = 221;
    
    
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, CS_Reject_RM = ?, CS_time_stamp = NOW(), CS_user_id = ?, ACC1_Reject_RM = NULL WHERE app_no = ?");
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
