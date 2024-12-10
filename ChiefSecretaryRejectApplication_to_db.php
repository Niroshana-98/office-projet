<?php
include 'connect.php';
session_start();

// Set content type for JSON response
header('Content-Type: application/json');

// Check if admin NIC is set in the session
if (!isset($_SESSION['nic'])) {
    echo json_encode(["success" => false, "error" => "User not logged in"]);
    exit;
}

$userNic = $_SESSION['nic'];

// Fetch the logged-in user's offi_id
$userQuery = "SELECT offi_id FROM users WHERE nic = ?";
$userStmt = $conn->prepare($userQuery);
$userStmt->bind_param('s', $userNic);
$userStmt->execute();
$userStmt->bind_result($userOffiId);
$userStmt->fetch();
$userStmt->close();

if (!$userOffiId) {
    echo json_encode(["success" => false, "error" => "User office ID not found"]);
    exit;
}

// Fetch applications where app_status = 111
$applicationsQuery1 = "
    SELECT 
        application.app_no, 
        application.name_eng, 
        desi.desi_name 
    FROM 
        application 
    INNER JOIN 
        desi 
    ON 
        application.desi = desi.desi_id
    WHERE 
        application.app_status IN (111)
";
$result1 = $conn->query($applicationsQuery1);
$applications1 = $result1->fetch_all(MYSQLI_ASSOC);

// Fetch applications for c_w_p with status 3
$applicationsQuery2 = "
    SELECT 
        application.app_no, 
        application.name_eng, 
        desi.desi_name 
    FROM 
        application 
    INNER JOIN 
        desi 
    ON 
        application.desi = desi.desi_id
    WHERE 
        application.c_w_p = ? 
        AND application.app_status = 3
";
$stmt2 = $conn->prepare($applicationsQuery2);
$stmt2->bind_param("i", $userOffiId);
$stmt2->execute();
$result2 = $stmt2->get_result();
$applications2 = $result2->fetch_all(MYSQLI_ASSOC);
$stmt2->close();

// Merge both application arrays
$allApplications = array_merge($applications1, $applications2);

// Return the applications as JSON
if (empty($allApplications)) {
    echo json_encode(["success" => true, "data" => [], "message" => "No new applications found."]);
} else {
    echo json_encode(["success" => true, "data" => $allApplications]);
}
?>
