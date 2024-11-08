<?php
require 'connect.php'; 

$response = ["success" => true];

// count rows where app_status = 2
$query = "SELECT COUNT(*) AS count FROM application WHERE app_status = '2'";
$result = mysqli_query($conn, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    $response['new_applications'] = $data['count'];
} else {
    echo json_encode(["success" => false, "error" => "Error fetching new application count"]);
    exit;
}

// count rows where app_status = 3
$queryApprove = "SELECT COUNT(*) AS count FROM application WHERE app_status = '3'";
$resultApprove = mysqli_query($conn, $queryApprove);

if ($resultApprove) {
    $data = mysqli_fetch_assoc($resultApprove);
    $response['approved_applications'] = $data['count'];
} else {
    echo json_encode(["success" => false, "error" => "Error fetching approved application count"]);
    exit;
}

// count rows where app_status = 4
$queryReject = "SELECT COUNT(*) AS count FROM application WHERE app_status = '4'";
$resultReject = mysqli_query($conn, $queryReject);

if ($resultReject) {
    $data = mysqli_fetch_assoc($resultReject);
    $response['rejected_applications'] = $data['count'];
} else {
    echo json_encode(["success" => false, "error" => "Error fetching rejected application count"]);
    exit;
}

echo json_encode($response);
?>
