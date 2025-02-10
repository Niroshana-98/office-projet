<?php
include 'connect.php';
session_start(); // Start session to access admin data

// Check if admin NIC is set in the session
if (!isset($_SESSION['nic'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized access.']);
    exit;
}

$admin_nic = $_SESSION['nic']; // Get admin NIC from session

// Step 1: Fetch admin offi_id using admin NIC
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

$usersQuery = "
    SELECT 
        users.user_id, 
        users.name, 
        users.nic,
        users.offi_id,
        office.offi_name, 
        desi.desi_name,
        users.desi,
        users.status
    FROM 
        users 
    LEFT JOIN 
        office ON users.offi_id = office.offi_id
    LEFT JOIN
        application ON users.nic = application.nic
    LEFT JOIN
        desi ON application.desi = desi.desi_id
    WHERE 
        users.status IN (1, 2, 3, 4, 5, 10, 18, 26, 30, 38, 42, 50, 54) 
";
$stmt = $conn->prepare($usersQuery);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }

    $stmt->close();
    
    // Return the applications as a JSON response
    header('Content-Type: application/json');
    echo json_encode($users);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Query preparation failed.']);
}
?>
