<?php
include 'connect.php';
session_start();

// Check if admin NIC is set in the session
if (!isset($_SESSION['nic'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized access.']);
    exit;
}

$admin_nic = $_SESSION['nic']; 

//Fetch admin offi_id using admin NIC
$offiIdQuery = "SELECT offi_id FROM users WHERE nic = ?";
$stmt = $conn->prepare($offiIdQuery);

if ($stmt) {
    $stmt->bind_param("s", $admin_nic); // Bind NIC parameter
    $stmt->execute();
    $stmt->bind_result($admin_offi_id);
    $stmt->fetch();
    $stmt->close();
    
    // If no `offi_id` is found for the NIC
    if (empty($admin_offi_id)) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Admin not found.']);
        exit;
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Query preparation failed.']);
    exit;
}

// Fetch applications where c_w_p matches admin offi_id and app_status = 2
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
        application.c_w_p = ? 
        AND application.app_status IN (2 , 3)
";
$stmt = $conn->prepare($applicationsQuery); 

if ($stmt) {
    $stmt->bind_param("i", $admin_offi_id); // Bind admin offi_id parameter
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
