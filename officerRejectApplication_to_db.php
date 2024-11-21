<?php
include 'connect.php'; 

$query = "SELECT app_no, name_eng, desi FROM application WHERE app_status = '6'";
$result = mysqli_query($conn, $query);

$applications = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $applications[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($applications); 
?>
