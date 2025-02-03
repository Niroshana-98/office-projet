<?php
require './connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Generate random OTP
    $otp = rand(100000, 999999);

    // Save OTP to database
    $stmt = $conn->prepare("UPDATE users SET otp = ? WHERE email = ?");
    $stmt->bind_param("ss", $otp, $email);

    if (!$stmt->execute()) {
        echo json_encode(["success" => false, "error" => "Failed to update OTP"]);
        exit;
    }

    // Send OTP via email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'djpasinduniroshana@gmail.com'; // Change this
        $mail->Password = 'wrxb kpcf miir faxi'; // Change this
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('djpasinduniroshana@gmail.com', 'Chief Secretariat Office Southern Province');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Verification Code';
        $mail->Body = '
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Your OTP Code</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f4f4f4;
                                margin: 0;
                                padding: 0;
                            }
                            .email-container {
                                max-width: 480px;
                                margin: 30px auto;
                                background: white;
                                padding: 20px;
                                border-radius: 10px;
                                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                                text-align: center;
                                animation: fadeIn 1s ease-in-out;
                            }
                            h2 {
                                color: #333;
                            }
                            .otp-box {
                                font-size: 24px;
                                font-weight: bold;
                                letter-spacing: 5px;
                                color: #fff;
                                background: #007BFF;
                                display: inline-block;
                                padding: 10px 20px;
                                border-radius: 8px;
                                margin: 20px 0;
                                animation: bounce 1.2s infinite;
                            }
                            .footer {
                                font-size: 12px;
                                color: #666;
                                margin-top: 20px;
                            }
                            @keyframes fadeIn {
                                from { opacity: 0; transform: translateY(-10px); }
                                to { opacity: 1; transform: translateY(0); }
                            }
                            @keyframes bounce {
                                0%, 100% { transform: translateY(0); }
                                50% { transform: translateY(-5px); }
                            }
                        </style>
                    </head>
                    <body>
                        <div class="email-container">
                            <h2>Password Reset OTP</h2>
                            <p>Hello,</p>
                            <p>Use the verification code below to reset your password:</p>
                            <div class="otp-box">'.$otp.'</div>
                            <p>If you did not request this, please ignore this email.</p>
                            <div class="footer">
                                <p>&copy; 2024 Chief Secretariat Office Southern Province</p>
                            </div>
                        </div>
                    </body>
                </html>';


        $mail->send();
        echo json_encode(["success" => true, "redirect" => "./resetPasswordOTP.php?email=" . urlencode($email)]);
    } catch (Exception $e) {
        echo json_encode(["success" => false, "error" => "Mail error: " . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
?>
