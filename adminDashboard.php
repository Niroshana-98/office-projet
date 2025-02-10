<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Control Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center title">🔹 User Account Management 🔹</h3>
        <p class="text-center subtitle">Effortlessly manage all user roles and assignments with an interactive experience.</p>

        <div class="row justify-content-center">
            <!-- All Users Card -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="card modern-card">
                    <div class="card-header all-cs-header">
                        <i class="fas fa-user-tie card-icon"></i> Create New Account
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="cs-count"></span> Create New Account
                        </h5>
                        <p class="card-text">Register a new CS account and manage user access.</p>
                        <a href="./adminCreateNewAcc.php" class="btn modern-btn">Create Account</a>
                    </div>
                </div>
            </div>

            <!-- Appointed Officers Card -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="card modern-card">
                    <div class="card-header appointed-officers-header">
                        <i class="fas fa-user-tie card-icon"></i> View Officer Account
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="officerHead-count"></span> Total Office Head 
                        </h5>
                        <p class="card-text">View and manage the appointed office head details.</p>
                        <a href="./adminOfficerList.php" class="btn modern-btn">Manage Office Head</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="card modern-card">
                    <div class="card-header all-users-header">
                        <i class="fas fa-users card-icon"></i> All Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="users-count"></span> Total All Users
                        </h5>
                        <p class="card-text">View and manage the appointed all user details.</p>
                        <a href="./adminUserAccountList.php" class="btn modern-btn">Manage All Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/adminDashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
