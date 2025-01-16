<?php
session_start();
require_once 'connect.php';

$response = ['success' => false, 'error' => 'Unknown error.'];

if (isset($_SESSION['nic'])) {
    $nic = $_SESSION['nic'];

    // update the users table status
    $stmt = $conn->prepare("UPDATE users SET status = 4 WHERE nic = ?");
    $stmt->bind_param("s", $nic);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // update the application table status
        $stmtApp = $conn->prepare("UPDATE application SET app_status = 2 , created = NOW() WHERE nic = ?");
        $stmtApp->bind_param("s", $nic);
        $stmtApp->execute();

        if ($stmtApp->affected_rows > 0) {
            $response['success'] = true;
        } else {
            $response['error'] = 'Failed to update application status.';
        }
        
        $stmtApp->close();
    } else {
        $response['error'] = 'Failed to update user status.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response['error'] = 'User not logged in.';
}

// Output the JSON response
echo json_encode($response);
?>
