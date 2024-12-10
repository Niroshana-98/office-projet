<?php
include 'connect.php';
session_start();

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

// Fetch the dist_offi_id from the office table
$officeQuery = "SELECT min_id FROM office WHERE offi_id = ?";
$officeStmt = $conn->prepare($officeQuery);
$officeStmt->bind_param('i', $userOffiId);
$officeStmt->execute();
$officeStmt->bind_result($minId);
$officeStmt->fetch();
$officeStmt->close();

if (!$minId) {
    echo json_encode(["success" => false, "error" => "Department ID not found"]);
    exit;
}

// Step 2: Fetch applications where c_w_p matches admin min_id and app_status = 2, 130
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
        application.min_id = ? 
        AND application.app_status IN (121)
";
$stmt1 = $conn->prepare($applicationsQuery1);
$stmt1->bind_param("i", $minId);
$stmt1->execute();
$result1 = $stmt1->get_result();
$applications1 = $result1->fetch_all(MYSQLI_ASSOC);
$stmt1->close();

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
header('Content-Type: application/json');
if (empty($allApplications)) {
    echo json_encode(["success" => true, "data" => [], "message" => "No new applications found."]);
} else {
    echo json_encode(["success" => true, "data" => $allApplications]);
}
?>
