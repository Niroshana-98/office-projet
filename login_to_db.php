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
                case 19:
                case 31:
                case 43:
                case 55:
                case 59:
                case 63:
                case 67:
                case 71:
                case 75:
                case 79:
                case 83:
                    $redirect_url = './adminOfficerTempory.php';
                    break;
                case 20:
                case 32:
                case 44:
                case 56:
                case 60:
                case 64:
                case 68:
                case 72:
                case 76:
                case 80:
                case 84:
                    $redirect_url = './adminOfficerOtp.php';
                    break;
                case 21:
                case 33:
                case 45:
                case 57:
                case 61:
                case 65:
                case 69:
                case 73:
                case 77:
                case 81:
                case 85:
                    $redirect_url = './adminOfficerToBeActivate.php';
                    break;
                case 22:
                    $redirect_url = './officeHead.php';
                    break;
                case 26:
                    $redirect_url = './distCheckOfficer.php';
                    break;
                case 30:
                    $redirect_url = './distRecommendOfficer.php';
                    break;
                case 34:
                    $redirect_url = './districtOfficeHead.php';
                    break;
                case 38:
                    $redirect_url = './depCheckOfficer.php';
                    break;
                case 42:
                    $redirect_url = './depRecOfficer.php';
                    break;
                case 46:
                    $redirect_url = './depHeadOfficer.php';
                    break;
                case 50:
                    $redirect_url = './minCheckOfficer.php';
                    break;
                case 54:
                    $redirect_url = './minRecOfficer.php';
                    break;
                case 58:
                    $redirect_url = './minHeadOfficer.php';
                    break;
                case 62:
                    $redirect_url = './csCheckOfficer.php';
                    break;
                case 66:
                    $redirect_url = './AOOfficer.php';
                    break;
                case 70:
                    $redirect_url = './ACSOfficer.php';
                    break;
                case 74:
                    $redirect_url = './DCSOfficer.php';
                    break;
                case 78:
                    $redirect_url = './CSec.php';
                    break;
                case 82:
                    $redirect_url = './ACC1.php';
                    break;
                case 86:
                    $redirect_url = './ACC2.php';
                    break;
                case 100:
                    $redirect_url = './admin.php';
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