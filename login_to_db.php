<?php
require 'connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query to get the user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR nic = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Check if the provided password matches the stored password
        if ($user['password'] === md5($password)) {
            session_start();
            $_SESSION['nic'] = $user['nic'];

            // Initialize the redirect URL
            $redirect_url = '';

            // Switch statement to determine the redirect URL based on the user's status
            switch ($user['status']) {
                case 1:
                    $redirect_url = './otp.php?email=' . urlencode($user['email']);
                    break;
                case 2:
                    $redirect_url = './dashboard.php';
                    break;
                case 3:
                    $redirect_url = './upload.php';
                    break;
                case 4:
                    $redirect_url = './applicationView.php';
                    break;
                case 5:
                    $redirect_url = './rejectApplication.php';
                    break;
                case 10:
                    $redirect_url = './subjectOfficer.php';
                    break;
                case 18:
                    $redirect_url = './officeRecommondOfficer.php';
                    break;
                case 22:
                    $redirect_url = './OfficeHead.php';
                    break;
                case 26:
                    $redirect_url = './distCheckOfficer.php';
                    break;
                case 30:
                    $redirect_url = './distRecommendOfficer.php';
                    break;
                case 34:
                    $redirect_url = './DistrictOfficer.php';
                    break;
                case 46:
                    $redirect_url = './DepartmentHead.php';
                    break;
                case 58:
                    $redirect_url = './MinistryHead.php';
                    break;
                case 62:
                    $redirect_url = './ChiefSecretary.php';
                    break;
                default:
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Invalid user status!',
                    ]);
                    exit();
            }

            // Return success response with redirect URL
            echo json_encode([
                'status' => 'success',
                'message' => 'Welcome, ' . $user['name'],
                'redirect_url' => $redirect_url,
            ]);
        } else {
            // Incorrect password
            echo json_encode([
                'status' => 'error',
                'message' => 'Incorrect password. Please try again!',
            ]);
        }
    } else {
        // User not found
        echo json_encode([
            'status' => 'error',
            'message' => 'User not found. Please try again!',
        ]);
    }

    $stmt->close();
}

$conn->close();
?>