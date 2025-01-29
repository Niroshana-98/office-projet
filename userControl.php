<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Control Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/userControl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center title">🔹 User Account Management 🔹</h3>
        <p class="text-center subtitle">Effortlessly manage user roles and assignments with an interactive experience.</p>

        <div class="row justify-content-center">
            <!-- All Users Card -->
            <div class="col-lg-6 col-md-8 col-sm-12 d-flex justify-content-center">
                <div class="card modern-card">
                    <div class="card-header all-users-header">
                        <i class="fas fa-users card-icon"></i> All Registered Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="users-count"></span> Total Users
                        </h5>
                        <p class="card-text">Browse all user profiles and manage access.</p>
                        <a href="./userControlList.php" class="btn modern-btn">Manage Users</a>
                    </div>
                </div>
            </div>

            <!-- Appointed Officers Card -->
            <div class="col-lg-6 col-md-8 col-sm-12 d-flex justify-content-center">
                <div class="card modern-card">
                    <div class="card-header appointed-officers-header">
                        <i class="fas fa-user-tie card-icon"></i> Appointed Officers
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="officers-count"></span> Active Officers
                        </h5>
                        <p class="card-text">View and manage the appointed officer details.</p>
                        <a href="./approvedUserList.php" class="btn modern-btn">View Officers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/userControl.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
