<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Website</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/subjectOfficer.css">
</head>
<body id="body-pd">

    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header-text">
            <h1>CHIEF SECRETARIAT SOUTHERN PROVINCE</h1>
            <h3>SCHOLARSHIP APPLICATION SYSTEM</h3> 
        </div>
        <div class="header_img"></div>
    </header>

    <header class="loginDetails">
        <div class="login-detail">
            <span class="label">Welcome:</span>
            <span class="value" id="user-name"></span>
        </div>
        <div class="login-detail">
            <span class="label">Job Position:</span>
            <span class="value" id="user-position">District Check Officer</span>
        </div>
        <div class="login-detail">
            <span class="label">Work Place:</span>
            <span class="value" id="user-work-place"></span> 
        </div>
        <div class="login-detail">
            <span class="label">Time:</span>
            <span class="value" id="login-time">Loading...</span>
        </div>
    </header>
    
    <!-- Sidebar Navigation -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="./distCheckOfficer.php" class="nav_logo">
                <i class='bx bx-home'></i>
                    <span class="nav_logo-name">Home</span>
                </a>
                <div class="nav_list">
                    <a href="./distCheckOfficerDashboard.php" class="nav_link active" target="content-frame">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="./Dashboard.php" class="nav_link" target="content-frame">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">My Application</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link" id="logout-link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
            <button id="logout-button" style="display:none;"></button>
        </nav>
    </div>
    
    <div class="height-100 bg-light" style="width: 100%; height: 100vh; overflow: hidden;">
        <iframe name="content-frame" src="./distCheckOfficerDashboard.php" 
                style="width: 100%; height: 100%; overflow: hidden;" 
                frameborder="0" scrolling="yes"> 
        </iframe>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./js/distCheckOfficer.js"></script>
    
</body>
</html>
