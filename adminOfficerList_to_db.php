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

// Step 2: Fetch users along with office name
$usersQuery = "
    SELECT  
        users.name, 
        users.nic,
        users.offi_id,
        office.offi_name, 
        users.desi,
        users.status 
    FROM 
        users 
    INNER JOIN 
        office ON users.offi_id = office.offi_id
    WHERE 
        users.status IN (19, 20, 21, 22, 31, 32, 33, 34, 43, 44, 45, 46, 55, 56, 57, 58,
    59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82,
    83, 84, 85, 86)
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
