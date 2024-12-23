<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="./css/otp.css">
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="./js/otp.js" defer></script>
</head>
<body>
    <div class="container">
        <header>
            <i class="bx bxs-check-shield"></i>
        </header>
        <h4>Enter OTP Code</h4>

        <!-- Properly structured form -->
        <form action="./otp_to_db.php?email=<?php echo $_GET['email']; ?>" method="post">
          <div class="input-field">
            <input type="number" name="otp[]" />
            <input type="number" name="otp[]" disabled /> 
            <input type="number" name="otp[]" disabled />
            <input type="number" name="otp[]" disabled />
            <input type="number" name="otp[]" disabled />
            <input type="number" name="otp[]" disabled />
          </div>
          <button>Verify OTP</button>
        </form>

    </div>
</body>
</html>
