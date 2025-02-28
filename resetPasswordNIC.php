

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password - Chief Secretariat Southern Province</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/resetPasswordNIC.css" rel="stylesheet">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="http://www.cs.sp.gov.lk/index_en.html">
                    <img src="./images/logo.png" alt="logo" class="logo"/> 
                </a>
                <div class="navbar-text mx-auto">Chief Secretariat Southern Province</div>
            </div>
        </nav> 

        <div class="container mt-5">
            
            <h2>Reset Your Password</h2>

            <div id="nic">
                <p>Enter your NIC number to retrieve your details</p>
                <div class="input-group mb-3">
                    <span class="input-group-text">🔒</span>
                    <input type="text" id="nicInput" class="form-control" placeholder="Enter NIC Number" required>
                </div>
                <button id="submitBtn" class="btn btn-primary">Submit</button>

            </div>
            
            <div id="userDetails" class="mt-4" style="display: none;">
                <h3>User Details</h3>
                <div class="userDetails">
                    <p><strong>Name:</strong> <span id="userName"></span></p>
                    <p><strong>Email:</strong> <span id="userEmail"></span></p>
                </div>
                <button id="backBtn" class="btn btn-primary">Back</button>
                <button id="veriCodeBtn" class="btn btn-primary">Get Verification Code </button>
            </div>

            <div class="footer mt-3">
                <p>Remembered your password? <a href="index.html">Login</a></p>
            </div>
        </div>

        <script src="./js/resetPasswordNIC.js"></script>

    </body>
</html>
