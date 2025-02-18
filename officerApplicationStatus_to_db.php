<?php
session_start();
require_once 'connect.php';

$response = ['success' => false, 'error' => 'Unknown error.'];

if (isset($_SESSION['nic'])) {
    $nic = $_SESSION['nic'];

    // Retrieve user status and offi_id from users table
    $stmt = $conn->prepare("SELECT status, offi_id FROM users WHERE nic = ?");
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $stmt->bind_result($status, $offi_id);
    $stmt->fetch();
    $stmt->close();

    if ($offi_id) {
        // Retrieve offi_cat from office table using offi_id
        $stmtOffice = $conn->prepare("SELECT offi_cat FROM office WHERE offi_id = ?");
        $stmtOffice->bind_param("i", $offi_id);
        $stmtOffice->execute();
        $stmtOffice->bind_result($offi_cat); 
        $stmtOffice->fetch();
        $stmtOffice->close();

        $newAppStatus = 2;

        // Update application table with new app_status
        $stmtApp = $conn->prepare("UPDATE application SET app_status = ?, created = NOW() WHERE nic = ?");
        $stmtApp->bind_param("is", $newAppStatus, $nic);
        $stmtApp->execute();

        if ($stmtApp->affected_rows > 0) {
            $response['success'] = true;
        } else {
            $response['error'] = 'Failed to update application status.';
        }

        $stmtApp->close();
    } else {
        $response['error'] = 'User office ID not found.';
    }

    $conn->close();
} else {
    $response['error'] = 'User not logged in.';
}

// Output the JSON response
echo json_encode($response);
?>
