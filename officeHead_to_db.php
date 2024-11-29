<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require './connect.php'; 

if (isset($_SESSION['nic'])) {
    $user_id = $_SESSION['nic']; 

    $query = "SELECT name, desi FROM users WHERE nic = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $user_id); 
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name, $desi);
        $stmt->fetch();
        
        echo json_encode(array('name' => $name, 'position' => $desi));
    } else {
        echo json_encode(array('error' => 'User not found'));
    }

    $stmt->close();
} else {
    echo json_encode(array('error' => 'Not logged in'));
}
?>
