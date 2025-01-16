<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/subjectOfficerDashboard.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Application Status</h2>
        <p class="text-center">Manage user applications and view details by category.</p>
        
        <div class="row">
            <!-- New Applications Card -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-new-applications text-white">
                        <i class="fas fa-file-alt card-icon"></i>
                        New Applications
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="new-applications-count"></span> Applications
                        </h5>
                        <p class="card-text">View details of new applications waiting for approval.</p>
                        <a href="./csCheckOfficerNewApplication.php" class="btn btn-outline-primary">View New Applications</a>
                    </div>
                </div>
            </div>

            <!-- Approved Applications Card -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-approved text-white">
                        <i class="fas fa-check-circle card-icon"></i>
                        Approved Applications
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="approved-applications-count"></span> Applications
                        </h5>
                        <p class="card-text">View details of applications that have been approved.</p>
                        <a href="./csCheckOfficerApprovedApplication.php" class="btn btn-outline-success">View Approved Applications</a>
                    </div>
                </div>
            </div>

            <!-- Rejected Applications Card -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-rejected text-white">
                        <i class="fas fa-times-circle card-icon"></i>
                        Rejected Applications
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="rejected-applications-count"></span> Applications
                        </h5>
                        <p class="card-text">View details of applications that have been rejected.</p>
                        <a href="./csCheckOfficerRejectApplication.php" class="btn btn-outline-danger">View Rejected Applications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/csCheckOfficerDashboard.js"></script>
</body>
</html>
