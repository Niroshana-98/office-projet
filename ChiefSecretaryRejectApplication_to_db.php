<?php
include 'connect.php';
session_start();

// Check if admin NIC is set in the session
if (!isset($_SESSION['nic'])) {
    echo json_encode(["success" => false, "error" => "User not logged in"]);
    exit;
}

// Fetch applications where app_status = 100
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
        application.app_status IN (3, 111)
";

$result = $conn->query($applicationsQuery);

$applications = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $applications[] = $row;
    }
    // Free result set
    $result->free();
} else {
    // Handle query failure
    echo json_encode(["success" => false, "error" => $conn->error]);
    exit;
}

// Return the applications as a JSON response
header('Content-Type: application/json');
echo json_encode($applications);
?>
