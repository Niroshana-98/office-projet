<?php
include 'connect.php';

//service
$service ="SELECT service_name FROM service";
$result = $conn->query($service);
$serviceNames = [];
if($result-> num_rows >0){
    while($row = $result->fetch_assoc()){
        $serviceNames[] = $row['service_name'];
    }
}

//job
$job ="SELECT desi_name FROM desi";
$result = $conn->query($job);
$jobNames = [];
if($result-> num_rows >0){
    while($row = $result->fetch_assoc()){
        $jobNames[] = $row['desi_name'];
    }
}

//ministry
$ministry ="SELECT min_name FROM ministry";
$result = $conn->query($ministry);
$ministryNames = [];
if($result-> num_rows >0){
    while($row = $result->fetch_assoc()){
        $ministryNames[] = $row['min_name'];
    }
}

//connection close
$conn->close();
$data = [
    'serviceNames' => $serviceNames,
    'jobNames' => $jobNames,
    'ministryNames' => $ministryNames
];

// Output JSON
echo json_encode($data);
?>