<?php

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

        // Fetch office
        if ($action === 'fetchOffices') {
            $query = "SELECT offi_id, offi_name FROM office";
            $result = mysqli_query($conn, $query);

            $offices = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $offices[] = $row;
            }

            echo json_encode($offices); // Return JSON response
            exit;
        }
    }
}
 
// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $office = $_POST['office']; 
    $password = $_POST['inputPassword'];
    $confirm_password = $_POST['inputConfirmPassword'];

    // Convert password to MD5
    $hashed_password = md5($password);

    // Check for existing user
    $stmt = $conn->prepare("SELECT * FROM users WHERE nic=? OR email=?");
    $stmt->bind_param("ss", $nic, $email);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        echo "<script>
                alert('A user with this NIC or email already exists.');
                window.location.href = 'register.php';
            </script>";
            exit;
    } else {

        //generate ramdom otp 
        $otp = rand(100000, 999999);

        // Prepare statement for insertion
        $stmt = $conn->prepare("INSERT INTO users (name, nic, email, tel, offi_id, password, otp, status) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, 1)");
        $stmt->bind_param("sssssss", $name, $nic, $email, $tel, $office, $hashed_password,$otp);

        if ($stmt->execute()) {
            // Send OTP via email
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

                // Content
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

                
                // Redirect to the OTP verification page
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
