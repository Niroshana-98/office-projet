<?php
include 'connect.php';
session_start(); // Start session to access admin data

// Check if admin NIC is set in the session
if (!isset($_SESSION['nic'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized access.']);
    exit;
}

$admin_nic = $_SESSION['nic'];

// Step 1: Fetch admin offi_id using admin NIC
$offiIdQuery = "SELECT offi_id FROM users WHERE nic = ?";
$stmt = $conn->prepare($offiIdQuery);

if ($stmt) {
    $stmt->bind_param("s", $admin_nic);
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
    INNER JOIN 
        users 
    ON 
        application.nic = users.nic
    WHERE 
        application.c_w_p = ? 
        AND application.app_status IN (100, 101, 110, 111, 114, 115,118, 119, 120, 121, 124, 125, 128, 129
        , 130, 131, 134, 135, 138, 139, 144, 145, 154, 155, 200, 201, 210, 211, 220, 221
        , 230, 231, 240, 241, 250, 260)
        AND users.status NOT IN (18, 22, 26, 30, 34, 38, 42, 46, 50, 54, 58, 62, 66, 70, 74, 78, 82, 86)
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
