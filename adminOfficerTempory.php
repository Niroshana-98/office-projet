<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Chief Secretariat Southern Province</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--<link href="./css/style.css" rel="stylesheet">
    <link href="./css/mediaquaries.css" rel="stylesheet">-->
    <link href="./css/register.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css" rel="stylesheet">


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


    <div class="form-container">
        <form class="msform" action="./adminOfficerTempory_to_db.php" method="POST">
            <h2 class="tracking-in-contract">Please Enter Your Details</h2>
            <div class="mb-3">
                <h5 for="exampleFormControlInput1" class="form-label">මුලකුරු සමග නම (සිංහලෙන්)</h5>
                <input type="text" class="form-control" id="name" name="name" placeholder=""  title="Only letters, Sinhala characters, periods, and single spaces are allowed." required>
            </div> 
            <div class="mb-3">
                <h5 for="exampleFormControlInput1" class="form-label">ජා.හැ. අංකය</h5>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="" 
                    title="Please enter a valid NIC (9 digits followed by 'V' or 12 digits starting with '19' or '20')." 
                    required>
            </div>
            <div class="mb-3">
                <h5 for="exampleFormControlInput1" class="form-label">ඊමේල් ලිපිනය</h5>
                <input type="email" class="form-control" id="email" name="email" placeholder="" 
                    title="Please enter a valid email address." required>
            </div>
            <div class="mb-3">
                <h5 for="exampleFormControlInput1" class="form-label">දුරකථන අංකය</h5>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="" 
                    title="Please enter a valid Sri Lankan mobile number (starting with 07 and followed by 8 digits)." 
                    required>
            </div>
            <div class="mb-3">
                <h5 for="office" class="form-label">සේවා ස්ථානය</h5>
                <select class="form-select" name="office" id="office" aria-label="searchable office" required>
                    <option value="" selected>Open this select menu</option>
                </select>
                <input type="hidden" name="offices" value="">
            </div> 
            <div class="mb-3">
                <h5 for="desi" class="form-label">තනතුර</h5>
                <select class="form-select" name="desi" id="desi" aria-label="searchable designation" required>
                    <option value="" selected>Open this select menu</option>
                </select>
                <input type="hidden" name="desis" value="">
            </div> 
            <div class="mb-3">
                <h5 for="inputPassword" class="form-label">මුරපදය</h5>
                <div style="position: relative;">
                    <input 
                        type="password" 
                        id="inputPassword" 
                        name="inputPassword" 
                        class="form-control" 
                        aria-describedby="passwordHelpBlock" 
                        title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long." 
                        required 
                        oninput="handlePasswordVisibility()">
                    <span 
                        id="toggleWrapper" 
                        onclick="togglePasswordVisibility()" 
                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; display: none;">
                        <i class="bx bx-show" id="toggleIcon"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <h5 for="inputConfirmPassword" class="form-label">මුරපදය නැවත ඇතුලත් කරන්න</h5>
                <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" class="form-control" aria-describedby="passwordHelpBlock" placeholder="" required>
                <div id="passwordError" class="text-danger" style="display:none;">Passwords do not match!</div>
            </div>
            <div class="button-container">
                <button type="submit" class="btn">SUBMIT</button>
                <button type="reset" class="btnReset" onclick="resetForm()">RESET</button>
                <button type="button" class="btnExit" onclick="closeWindow()">EXIT</button>
            </div>
            <div class="login-register">
                <p>Already have an account? <a href="./index.html">Sign In</a></p>
            </div>
        </form>
    </div>
    <section class="hero-section">    
    </section>
    
    <script src="./js/adminOfficerTempory.js"></script>
</body>
</html>
