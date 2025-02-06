<?php
session_start(); // Start session to access stored user data
require './connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

// Handle AJAX requests for fetching data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Fetch offices
        if ($action === 'fetchOffices') {
            $query = "SELECT offi_id, offi_name FROM office";
            $result = mysqli_query($conn, $query);

            $offices = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $offices[] = $row;
            }

            echo json_encode($offices);
            exit;
        }

        // Fetch designations
        if ($action === 'fetchDesi') {
            $query = "SELECT desi_id, desi_name FROM desi"; 
            $result = mysqli_query($conn, $query);

            $designations = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $designations[] = $row;
            }

            echo json_encode($designations);
            exit;
        }
    }
}

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get logged-in user's NIC from session
    if (!isset($_SESSION['nic'])) {
        echo "<script>alert('Session expired. Please log in again.'); window.location.href = 'login.php';</script>";
        exit;
    }

    $loggedInNic = $_SESSION['nic']; // Fetch NIC from session

    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $office = $_POST['office'];
    $desi = $_POST['desi'];
    $password = $_POST['inputPassword'];
    $confirm_password = $_POST['inputConfirmPassword'];

    // Convert password to MD5
    $hashed_password = md5($password);

    // Check for existing user
    $stmt = $conn->prepare("SELECT * FROM users WHERE nic=? OR email=?");
    $stmt->bind_param("ss", $loggedInNic, $email);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        echo "<script>alert('A user with this NIC or email already exists.');</script>";
    } else {

        $stmt = $conn->prepare("SELECT status FROM users WHERE nic = ?");
        $stmt->bind_param("s", $loggedInNic);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $currentStatus = $row['status'];

            // Change status if conditions match
            if ($currentStatus == 19) {
                $newStatus = 20;
            } elseif ($currentStatus == 31) {
                $newStatus = 32; 
            }elseif ($currentStatus == 43) {
                $newStatus = 44; 
            }elseif ($currentStatus == 55) {
                $newStatus = 56; 
            }elseif ($currentStatus == 59) {
                $newStatus = 60; 
            }elseif ($currentStatus == 63) {
                $newStatus = 64;
            }elseif ($currentStatus == 67) {
                $newStatus = 68; 
            }elseif ($currentStatus == 71) {
                $newStatus = 72; 
            }elseif ($currentStatus == 75) {
                $newStatus = 76; 
            }elseif ($currentStatus == 79) {
                $newStatus = 80; 
            }elseif ($currentStatus == 83) {
                $newStatus = 84; 
            } else {
                $newStatus = $currentStatus; // Keep the current status
            }
        }
        // Generate random OTP
        $otp = rand(100000, 999999);

        // Insert data using session NIC
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, tel = ?, offi_id = ?, desi = ?, password = ? , otp = ?, status = ? WHERE nic = ?) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $loggedInNic, $email, $tel, $office, $desi, $hashed_password, $otp, $newStatus);

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
                        <p style='font-size: 16px; color: #555;'>Thank you for registering. Please use the following code to verify your email address:</p>
                        
                        <div style='font-size: 24px; color: #4CAF50; font-weight: bold; padding: 10px; border: 2px dashed #4CAF50; display: inline-block; margin: 20px 0;'>
                            $otp
                        </div>
                        
                        <p style='font-size: 16px; color: #555;'>If you didn’t request this, please ignore this email.</p>
                        
                        <p style='font-size: 14px; color: #999; margin-top: 20px;'>Best Regards,<br>Chief Secretariat Southern Province</p>
                    </div>
                ";
                $mail->send();

                echo "<script>alert('Registration successful! Check your email for the OTP.'); window.location.href = './otp.php?email=" . urlencode($email) . "';</script>";
            } catch (Exception $e) {
                echo "<script>alert('OTP email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
    }
    $stmt->close();
}
$conn->close();
?>
