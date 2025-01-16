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
$officeQuery = "SELECT dep_id FROM office WHERE offi_id = ?";
$officeStmt = $conn->prepare($officeQuery);
$officeStmt->bind_param('i', $userOffiId);
$officeStmt->execute();
$officeStmt->bind_result($depId);
$officeStmt->fetch();
$officeStmt->close();

if (!$depId) {
    echo json_encode(["success" => false, "error" => "Department ID not found"]);
    exit;
}

// Step 2: Fetch applications where c_w_p matches admin offi_id and app_status = 140
$applicationsQuery = "
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
        application.dep_id = ? 
        AND application.app_status IN (100, 101, 110, 111, 114, 115,118, 119, 120, 128, 129
        , 200, 201, 210, 211, 220, 221
        , 230, 231, 240, 241, 250, 260)
        AND application.offi_cat IN (4, 5)
";
$stmt = $conn->prepare($applicationsQuery);

if ($stmt) {
    $stmt->bind_param("i", $depId); // Bind admin offi_id parameter
    $stmt->execute();
    $result = $stmt->get_result();

    $applications = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $applications[] = $row;
        }
    }

    $stmt->close();
    
    // Return the applications as a JSON response
    header('Content-Type: application/json');
    echo json_encode($applications);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Query preparation failed.']);
}
?>
