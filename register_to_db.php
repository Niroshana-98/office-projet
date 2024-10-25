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

        // Fetch services
        if ($action === 'fetchServices') {
            $query = "SELECT service_id, service_name FROM service";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['service_id'].'">'.$row['service_name'].'</option>';
            }
            exit;
        }

        // Fetch Grades
        if($action === 'fetchGrades' && isset($_POST['service_id'])){
            $service_id = $_POST['service_id'];
            $query = "SELECT grade_id, grade_name FROM grade WHERE service_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $service_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['grade_id'].'">'.$row['grade_name'].'</option>';
            }
            exit;
        }

        // Fetch Position
        if($action === 'fetchPositions' && isset($_POST['grade_id'])){
            $grade_id = $_POST['grade_id'];
            $query = "SELECT desi_id, desi_name FROM desi WHERE grade_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $grade_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_assoc($result)){
                echo '<option value="'.$row['desi_id'].'">'.$row['desi_name'].'</option>';
            }
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
    $service = $_POST['service']; 
    $grade = $_POST['grade'];    
    $position = $_POST['position']; 
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
        echo "<script>alert('A user with this NIC or email already exists.');</script>";
    } else {

        //generate ramdom otp 
        $otp = rand(100000, 999999);

        // Prepare statement for insertion
        $stmt = $conn->prepare("INSERT INTO users (name, nic, email, tel, service, grade, desi, password, otp, status) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");
        $stmt->bind_param("sssssssss", $name, $nic, $email, $tel, $service, $grade, $position, $hashed_password,$otp);

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
                $mail->Subject = 'Your Email Verification Code';
                $mail->Body    = "Your OTP code is <b>$otp</b>";
                
                $mail->send();
                
                // Redirect to the OTP verification page
                echo "<script>alert('Registration successful! Check your email for the OTP.'); window.location.href = './otp.php?email=$email';</script>";
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
