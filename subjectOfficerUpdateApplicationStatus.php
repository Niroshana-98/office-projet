<?php
session_start();
require 'connect.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

// Clean any previous output buffers
ob_clean();

header('Content-Type: application/json');

// Check if necessary data is passed from the frontend
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['app_no']) || !isset($data['status']) || !isset($data['nic'])) {
    echo json_encode(['success' => false, 'error' => 'Missing application number, status, or NIC']);
    exit;
}

$app_no = $data['app_no'];
$status = $data['status'];
$comment = isset($data['comment']) ? $data['comment'] : ''; 
$nic = $data['nic']; 

// Debug: log NIC value to verify
error_log("NIC Received: " . $nic);

// Get the applicant's details from the session (assuming NIC is stored in session)
$session_nic = isset($_SESSION['nic']) ? $_SESSION['nic'] : ''; // NIC stored in session for the logged-in user

if (!$session_nic) {
    echo json_encode(['success' => false, 'error' => 'No applicant session found']);
    exit;
}

// Fetch the applicant's email from the database based on NIC (session)
$stmt = $conn->prepare("SELECT email, name FROM users WHERE nic = ?");
$stmt->bind_param("s", $session_nic); 
$stmt->execute();
$result = $stmt->get_result();

// Debug: Check if the NIC exists in the database
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $applicant_name = $row['name'];
    // Debug: log fetched email and applicant name
    error_log("Fetched Applicant Email: " . $email);
    error_log("Fetched Applicant Name: " . $applicant_name);
} else {
    // NIC not found, return error response
    echo json_encode(['success' => false, 'error' => 'Applicant email not found']);
    exit;
}

// Get admin details from session (assuming admin details are stored in session)
$admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin'; // default to 'Admin' if not set
$admin_email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : 'admin@example.com'; // default admin email

// Update application status based on the given status
if ($status == 4 && !empty($comment)) {
    $stmt = $conn->prepare("UPDATE application SET app_status = ?, rejected = ? WHERE app_no = ?");
    $stmt->bind_param("iss", $status, $comment, $app_no);
} elseif ($status == 3) {
    $stmt = $conn->prepare("UPDATE application SET app_status = ? WHERE app_no = ?");
    $stmt->bind_param("is", $status, $app_no);
} else {
    $stmt = $conn->prepare("UPDATE application SET app_status = ? WHERE app_no = ?");
    $stmt->bind_param("is", $status, $app_no);
}

if ($stmt->execute()) {
    // If application status is updated successfully, update user status only if the status is rejected (4)
    if ($status == 4) {
        $stmt = $conn->prepare("UPDATE users SET status = 5 WHERE nic = ?");
        $stmt->bind_param("s", $nic); 
        $stmt->execute();
    }

    // Send rejection email if the status is 4 (rejected)
    if ($status == 4) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'djpasinduniroshana@gmail.com'; // Change to your email
            $mail->Password   = 'wrxb kpcf miir faxi'; // Change to your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('djpasinduniroshana@gmail.com', 'Chief Secretariat Southern Province');
            $mail->addAddress($email); // Using the fetched applicant email

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Application Rejected';
            $mail->Body    = "
                <div style='font-family: Arial, sans-serif; color: #333; text-align: center; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: linear-gradient(to right, #ff7e5f, #feb47b); animation: fadeIn 1.5s ease-in-out;'>
                    <h2 style='color: #ffffff; font-size: 28px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);'>
                        Application Rejected
                    </h2>
                    <p style='font-size: 18px; color: #f9f9f9;'>Hello, $applicant_name,</p>
                    <p style='font-size: 16px; color: #f9f9f9;'>We regret to inform you that your application has been rejected. Below is the reason for rejection:</p>
                    
                    <div style='font-size: 18px; color: #ff6347; font-weight: bold; padding: 15px; border: 2px dashed #ff6347; background-color: #fff; border-radius: 5px; margin: 20px 0; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); animation: slideIn 1s ease-out;'>
                        $comment
                    </div>
                    
                    <p style='font-size: 16px; color: #f9f9f9;'>If you have any questions or would like further clarification, please contact us at [Your Contact Info].</p>
                    
                    <p style='font-size: 14px; color: #f9f9f9; margin-top: 20px;'>Best Regards,<br>$admin_name<br>Chief Secretariat Southern Province</p>
                </div>
                <style>
                    @keyframes fadeIn {
                        from { opacity: 0; }
                        to { opacity: 1; }
                    }

                    @keyframes slideIn {
                        from { transform: translateX(-50%); opacity: 0; }
                        to { transform: translateX(0); opacity: 1; }
                    }
                </style>
            ";

            $mail->send();
            echo json_encode(['success' => true, 'message' => 'Application and user status updated successfully']);

        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
            exit;
        }
    } else {
        echo json_encode(['success' => true, 'message' => 'Application status updated successfully']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to update application status']);
}

?>