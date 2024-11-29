<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require './connect.php'; 

if (isset($_SESSION['nic'])) {
    $user_id = $_SESSION['nic']; 

    $query = "SELECT name, offi_id FROM users WHERE nic = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $user_id); 
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name, $offi_id);
        $stmt->fetch();
        
        // Fetch office name using offi_id
        $office_stmt = $conn->prepare("SELECT offi_name FROM office WHERE offi_id = ?");
        $office_stmt->bind_param("i", $offi_id);
        $office_stmt->execute();
        $office_result = $office_stmt->get_result(); 

        if ($office_result->num_rows > 0) {
            $officeData = $office_result->fetch_assoc();
            $offi_name = $officeData['offi_name'];
        } else {
            $offi_name = 'Unknown';
        }

        $office_stmt->close();

        // Prepare response data
        echo json_encode(array(
            'name' => $name,
            'offi_name' => $offi_name
        ));
    } else {
        // User not found
        echo json_encode(array('error' => 'User not found'));
    }

    $stmt->close();
} else {
    // User not logged in
    echo json_encode(array('error' => 'Not logged in'));
}
?>