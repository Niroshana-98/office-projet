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
        <h3 class="text-center title">🔹 CS Account Management 🔹</h3>
        <p class="text-center subtitle">Effortlessly create, view, and manage CS accounts.</p>

        <div class="row justify-content-center">
            <!-- Create New CS Account Card -->
            <div class="col-lg-6 col-md-8 col-sm-12 d-flex justify-content-center">
                <div class="card modern-card">
                    <div class="card-header all-cs-header">
                        <i class="fas fa-user-plus card-icon"></i> Create New CS Account
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Create CS Officers</h5>
                        <p class="card-text">Register a new CS account and manage user access.</p>
                        <a href="./userControlList.php" class="btn modern-btn">Create Account</a>
                    </div>
                </div>
            </div>

            <!-- View & Delete Account Card -->
            <div class="col-lg-6 col-md-8 col-sm-12 d-flex justify-content-center">
                <div class="card modern-card">
                    <div class="card-header appointed-officers-header">
                        <i class="fas fa-user-slash card-icon"></i> View & Delete Account
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="officers-count"></span> Active Accounts
                        </h5>
                        <p class="card-text">View and delete CS accounts as needed.</p>
                        <a href="./csOfficersList.php" class="btn modern-btn">Manage Accounts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/csOfficers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
