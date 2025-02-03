<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/createNewPassword.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Create New Password</h2>
        <form action="createNewPassword_to_db.php" method="POST">
            <div class="input-container">
                <label for="inputPassword" class="form-label">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Enter password">
                    <i class="fas fa-eye" id="togglePassword" onclick="togglePassword()"></i>
                </div>
            </div>

            <div class="input-container">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm password">
                    <i class="fas fa-eye" id="toggleConfirmPassword" onclick="toggleConfirmPassword()"></i>
                </div>
            </div>
            
            <button type="submit" class="btn">Reset Password</button>
        </form>
    </div>

    <script src="js/createNewPassword.js"></script>
</body>
</html>
