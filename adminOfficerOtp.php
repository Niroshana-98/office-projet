<?php
session_start();

$nic = isset($_SESSION['nic']) ? $_SESSION['nic'] : null;

$email = isset($_GET['email']) ? $_GET['email'] : null;

if (!$nic && !$email) {
    echo "<script>alert('Email or NIC is required. Please try again.'); window.location.href='index.html';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="./css/otp.css">
    <script src="./js/adminOfficerOtp.js" defer></script>
</head>
<body>
    <div class="container">
        <header>
            <i class="bx bxs-check-shield"></i>
        </header>
        <h4>Enter OTP Code</h4>

        <form action="./adminOfficerOtp_to_db.php" method="post">
            <!-- Hidden fields to pass email and NIC -->
            <input type="hidden" name="nic" value="<?php echo htmlspecialchars($nic); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <div class="input-field">
                <input type="number" name="otp[]" maxlength="1" required autofocus />
                <input type="number" name="otp[]" maxlength="1" disabled />
                <input type="number" name="otp[]" maxlength="1" disabled />
                <input type="number" name="otp[]" maxlength="1" disabled />
                <input type="number" name="otp[]" maxlength="1" disabled />
                <input type="number" name="otp[]" maxlength="1" disabled />
            </div>
            <button type="submit">Verify OTP</button>
        </form>
    </div>
</body>
</html>
