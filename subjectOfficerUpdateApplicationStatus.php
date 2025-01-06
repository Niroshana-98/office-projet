<?php
session_start();
require 'connect.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

ob_start();
header('Content-Type: application/json');

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

// Fetch c_w_p for the given application number
$stmt = $conn->prepare("SELECT c_w_p FROM application WHERE app_no = ?");
$stmt->bind_param("s", $app_no);
$stmt->execute();
$stmt->bind_result($c_w_p);
$stmt->fetch();
$stmt->close();

if (!$c_w_p) {
    echo json_encode(['success' => false, 'error' => 'c_w_p not found for the given application']);
    exit;
}

// Fetch offi_cat from the office table using c_w_p
$stmt = $conn->prepare("SELECT offi_cat FROM office WHERE offi_id = ?");
$stmt->bind_param("s", $c_w_p);
$stmt->execute();
$stmt->bind_result($offi_cat);
$stmt->fetch();
$stmt->close();

if (!$offi_cat) {
    echo json_encode(['success' => false, 'error' => 'Office category not found']);
    exit;
}

// Determine app_status based on offi_cat
$app_status = null;
switch ($offi_cat) {
    case 1:
        $app_status = 100;
        break;
    case 2:
        $app_status = 110;
        break;
    case 3:
        $app_status = 120;
        break;
    case 4:
        $app_status = 130;
        break;
    case 5:
        $app_status = 140;
        break;
    case 6:
        $app_status = 150;
        break;
    default:
        echo json_encode(['success' => false, 'error' => 'Invalid office category']);
        exit;
}


// Update application table with the determined app_status
$stmt = $conn->prepare("UPDATE application SET app_status = ?, Subject_Aprv_RM = ?, Subject_time_stamp = NOW(), Subject_user_id = ?, office_Rec_Reject_RM = NULL WHERE app_no = ?");
$stmt->bind_param("isis", $app_status, $comment, $user_id, $app_no);

if ($stmt->execute()) {
    $stmt->close();

    // Optional: Handle additional actions for rejected applications (status == 4)
    if ($status == 4 && !empty($comment)) {
        // Update rejection reason
        $stmt = $conn->prepare("UPDATE application SET app_status = ?, Subject_Reject_RM = ?, Subject_time_stamp = NOW(), Subject_user_id = ?  WHERE app_no = ?");
        $stmt->bind_param("isis", $status, $comment, $user_id, $app_no);
        if ($stmt->execute()) {
            // Update user status to 5 (Rejected)
            $stmt = $conn->prepare("UPDATE users SET status = 5 WHERE nic = ?");
            $stmt->bind_param("s", $nic); 
            $stmt->execute();

            // Send rejection email if the status is 4 (rejected)
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
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'djpasinduniroshana@gmail.com';
                $mail->Password = 'wrxb kpcf miir faxi'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // Recipients
                $mail->setFrom('djpasinduniroshana@gmail.com', 'Chief Secretariat Southern Province');
                $mail->addAddress($email); 

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
                        
                        <p style='font-size: 14px; color: #f9f9f9; margin-top: 20px;'>Best Regards,<br><br>Chief Secretariat Southern Province</p>
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
                error_log("Mailer Error: " . $mail->ErrorInfo);
                echo json_encode(['success' => false, 'error' => 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
                exit;
            }
        }
    } else {
        echo json_encode(['success' => true, 'message' => 'Application status updated successfully']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to update application status']);
}

ob_end_flush();
?>
