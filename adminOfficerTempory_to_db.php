<?php
session_start(); // Start session to access stored user data
require './connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

// Handle AJAX requests for fetching data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    // Fetch offices
    if ($action === 'fetchOffices') {
        $query = "SELECT offi_id, offi_name FROM office";
        $result = mysqli_query($conn, $query);
        $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($offices);
        exit;
    }

    // Fetch designations
    if ($action === 'fetchDesi') {
        $query = "SELECT desi_id, desi_name FROM desi"; 
        $result = mysqli_query($conn, $query);
        $designations = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($designations);
        exit;
    }
}

// Handle registration/update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check session for logged-in NIC
    if (!isset($_SESSION['nic'])) {
        echo "<script>alert('Session expired. Please log in again.'); window.location.href = 'index.html';</script>";
        exit;
    }

    $loggedInNic = $_SESSION['nic']; // Fetch NIC from session
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $office = $_POST['office'];
    $desi_id = $_POST['desi'];
    $password = $_POST['inputPassword'];
    $confirm_password = $_POST['inputConfirmPassword'];

    // Convert password to MD5
    $hashed_password = md5($password);

    // **Fetch desi_name using desi_id**
    $stmt = $conn->prepare("SELECT desi_name FROM desi WHERE desi_id = ?");
    $stmt->bind_param("s", $desi_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $desi_name = "";
    if ($row = $result->fetch_assoc()) {
        $desi_name = $row['desi_name'];
    } else {
        echo "<script>alert('Invalid designation selected.');</script>";
        exit;
    }
    $stmt->close();

    // Check for existing email in other accounts
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND nic != ?");
    $stmt->bind_param("ss", $email, $loggedInNic);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('A user with this email already exists. Please use a different email.');</script>";
    } else {
        // Fetch current status
        $stmt = $conn->prepare("SELECT status FROM users WHERE nic = ?");
        $stmt->bind_param("s", $loggedInNic);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $newStatus = null;
        if ($row = $result->fetch_assoc()) {
            $currentStatus = $row['status'];
            $statusMapping = [
                19 => 20, 31 => 32, 43 => 44, 55 => 56, 
                59 => 60, 63 => 64, 67 => 68, 71 => 72, 
                75 => 76, 79 => 80, 83 => 84
            ];
            $newStatus = $statusMapping[$currentStatus] ?? $currentStatus;
        }

        // Generate random OTP
        $otp = rand(100000, 999999);

        // Update user details
        $stmt = $conn->prepare("UPDATE users SET name = ?, nic = ?, email = ?, tel = ?, offi_id = ?, desi = ?, password = ?, otp = ?, status = ? WHERE nic = ?");
        $stmt->bind_param("ssssssssss", $name, $nic, $email, $tel, $office, $desi_name, $hashed_password, $otp, $newStatus, $loggedInNic);

        if ($stmt->execute()) {
            // Send OTP via email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'djpasinduniroshana@gmail.com'; 
                $mail->Password   = 'wrxb kpcf miir faxi';            
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('djpasinduniroshana@gmail.com', 'Chief Secretariat Southern Province');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Verify Your Email Address';
                $mail->Body = "
                    <div style='font-family: Arial, sans-serif; color: #333; text-align: center; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;'>
                        <h2 style='color: #4CAF50;'>Email Verification Code</h2>
                        <p style='font-size: 16px; color: #555;'>Hello,</p>
                        <p style='font-size: 16px; color: #555;'>Thank you for updating your details. Please use the following code to verify your email address:</p>
                        
                        <div style='font-size: 24px; color: #4CAF50; font-weight: bold; padding: 10px; border: 2px dashed #4CAF50; display: inline-block; margin: 20px 0;'>
                            $otp
                        </div>
                        
                        <p style='font-size: 16px; color: #555;'>If you didn’t request this, please ignore this email.</p>
                        
                        <p style='font-size: 14px; color: #999; margin-top: 20px;'>Best Regards,<br>Chief Secretariat Southern Province</p>
                    </div>
                ";
                $mail->send();

                echo "<script>alert('Update successful! Check your email for the OTP.'); window.location.href = './adminOfficerOtp.php?email=" . urlencode($email) . "';</script>";
            } catch (Exception $e) {
                echo "<script>alert('OTP email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script>alert('Error updating details: " . $stmt->error . "');</script>";
        }
    }
    $stmt->close();
}
$conn->close();
?>
