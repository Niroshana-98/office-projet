<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not found in session']);
    exit;
}

$nic = $_SESSION['nic'];

// Check database connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Database connection failed: ' . $conn->connect_error]));
}

$stmt = $conn->prepare("
    SELECT
        a.app_no, a.offi_cat, a.app_status, a.name_eng, a.c_w_p, o.offi_name offiName, dist.dist_offi_name as distName,
        dep.dep_name, m.min_name
    FROM
        application a
    LEFT JOIN
        office o
    ON
        a.c_w_p = o.offi_id
    LEFT JOIN
        dist_offi dist
    ON
        a.dist_offi_id = dist.dist_offi_id
    LEFT JOIN
        dep 
    ON
        a.dep_id = dep.dep_id
    LEFT JOIN
        ministry m
    ON
        a.min_id = m.min_id
    WHERE
        a.nic = ?
");

if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'SQL preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($appNo, $offi_cat, $app_status, $name_eng, $c_w_p, $offiName, $distName, $dep_name, $min_name);

if ($stmt->fetch()) {
    echo json_encode([
        'success' => true,
        'app_no' => $appNo,
        'offi_cat' => $offi_cat,
        'app_status' => $app_status,
        'name_eng' => $name_eng,
        'c_w_p' => $c_w_p,
        'offiName' => $offiName,
        'distName' => $distName,
        'dep_name' => $dep_name,
        'min_name' => $min_name
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}

$stmt->close();
$conn->close();
?>
