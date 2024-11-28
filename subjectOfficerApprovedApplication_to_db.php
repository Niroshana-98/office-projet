<?php
include 'connect.php'; 

// Query to join `application` and `desi` table to fetch `desi_name`
$query = "
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
        application.app_status = '110'
";

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
