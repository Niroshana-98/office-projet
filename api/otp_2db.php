<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['otp']) && is_array($_POST['otp'])) {
        $email = $_GET['email']; 
        $entered_otp = implode('', $_POST['otp']); 

        // Query to fetch the correct OTP from the database
        $stmt = $conn->prepare("SELECT otp FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $db_otp = $row['otp'];

            // Compare the entered OTP with the one in the database
            if ($entered_otp == $db_otp) {
                // OTP matched, update the status of the user to 2
                $stmt = $conn->prepare("UPDATE users SET status=2 WHERE email=?");
                $stmt->bind_param("s", $email);
                if ($stmt->execute()) {
                    echo "<script>alert('OTP Verified! Redirecting to homepage.'); window.location.href = '../index.html';</script>";
                } else {
                    echo "<script>alert('Error updating the status.');</script>";
                }
            } else {
                // OTP did not match
                echo "<script>alert('Invalid OTP. Please try again.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('User not found.'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter the OTP.'); window.history.back();</script>";
    }
}
$conn->close();
?>
