<?php
require 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Fetch office
        if ($action === 'fetchOffices') {
            $query = "SELECT offi_id, offi_name FROM office";
            $result = mysqli_query($conn, $query);

            $offices = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $offices[] = $row;
            }

            echo json_encode($offices); // Return JSON response
            exit;
        }
    }
}

$conn->close();
?>