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
    if ($offi_cat == 6) {
        $app_status = 130; // Approved status for offi_cat = 6
    } elseif ($offi_cat == 5) {
        $app_status = 140; // Approved status for offi_cat = 5
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid offi_cat value']);
        exit();
    }

    // Update the application status
    $stmt = $conn->prepare("UPDATE application SET app_status = ? WHERE app_no = ?");
    $stmt->bind_param("ii", $app_status, $app_no);

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
    $stmt = $conn->prepare("
        UPDATE application 
        SET app_status = ?, rejected = ? 
        WHERE app_no = ?
    ");
    $stmt->bind_param("iss", $status, $comment, $app_no);

    if ($stmt->execute()) {
        // Update user status to "Rejected"
        $stmt = $conn->prepare("UPDATE users SET status = 5 WHERE nic = ?");
        $stmt->bind_param("s", $nic);
        $stmt->execute();

        // Fetch applicant's email
        $stmt = $conn->prepare("SELECT name_eng, email_pri FROM application WHERE app_no = ?");
        $stmt->bind_param("s", $app_no);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email_pri'];
            $applicant_name = $row['name_eng'];

            // Send rejection email
            if (!empty($email)) {
                $mail = new PHPMailer(true);
                try {
                    // SMTP server configuration
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'djpasinduniroshana@gmail.com'; // Secure storage for credentials
                    $mail->Password   = 'wrxb kpcf miir faxi'; // Secure storage for credentials
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    // Email details
                    $mail->setFrom('djpasinduniroshana@gmail.com', 'Chief Secretariat Southern Province');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Application Rejected';
                    $mail->Body = "
                        <div style='font-family: Arial, sans-serif; text-align: center;'>
                            <h2 style='color: red;'>Application Rejected</h2>
                            <p>Dear $applicant_name,</p>
                            <p>Your application has been rejected for the following reason:</p>
                            <blockquote style='color: darkred; font-weight: bold;'>$comment</blockquote>
                            <p>If you have any questions, please contact us.</p>
                            <p>Best regards,</p>
                            <p>Chief Secretariat Southern Province</p>
                        </div>
                    ";

                    $mail->send();
                    echo json_encode(['success' => true, 'message' => 'Application rejected and email sent']);
                } catch (Exception $e) {
                    error_log("Mailer Error: " . $mail->ErrorInfo);
                    echo json_encode(['success' => false, 'error' => 'Failed to send rejection email.']);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Recipient email is missing']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Applicant email not found']);
        }
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
