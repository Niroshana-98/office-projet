<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json'); // Set header to JSON for AJAX response

if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not found in session']);
    exit;
}

$nic = $_SESSION['nic'];

$stmt = $conn->prepare("SELECT app_no, name_si, name_full, name_eng, nic, address_pri, tel_land, tel_mob, email_pri, service, grade, upp_status, desi, c_w_p, min, date_att_sp, ins_name, course_name, service_minite_no, course_start_date, course_end_date, course_fee, before_recieved, bf_01course_name, bf_01ins_name, bf_01start_date, bf_01gov_paid, bf_01full_course_fee,bf_02course_name, bf_02ins_name, bf_02start_date, bf_02gov_paid, bf_02full_course_fee FROM application WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($appNo, $nameSi, $nameFull, $nameEng, $nic, $addressPri, $telLand, $telMob, $emailPri, $service, $grade, $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, $service_minite_no, $course_start_date, $course_end_date, $course_fee, $before_recieved, $bf_01course_name, $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, $bf_02course_name, $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee);
$stmt->fetch();
$stmt->close();

if ($appNo) {
    echo json_encode([
        'success' => true,
        'app_no' => $appNo,
        'name_si' => $nameSi,
        'name_full' => $nameFull,
        'name_eng' => $nameEng,
        'nic' => $nic,
        'address_pri' => $addressPri,
        'tel_land' => $telLand,
        'tel_mob' => $telMob,
        'email_pri' => $emailPri,
        'service' => $service,
        'grade' => $grade,
        'upp_status' => $upp_status,
        'desi' => $desi,
        'c_w_p' => $c_w_p,
        'min' => $min,
        'date_att_sp' => $date_att_sp,
        'ins_name' => $ins_name,
        'course_name' => $course_name,
        'service_minite_no' => $service_minite_no,
        'course_start_date' => $course_start_date,
        'course_end_date' => $course_end_date,
        'course_fee' => $course_fee,
        'before_recieved' => $before_recieved,
        'bf_01course_name' => $bf_01course_name,
        'bf_01ins_name' => $bf_01ins_name,
        'bf_01start_date' => $bf_01start_date,
        'bf_01gov_paid' => $bf_01gov_paid,
        'bf_01full_course_fee' => $bf_01full_course_fee,
        'bf_02course_name' => $bf_02course_name,
        'bf_02ins_name' => $bf_02ins_name,
        'bf_02start_date' => $bf_02start_date,
        'bf_02gov_paid' => $bf_02gov_paid,
        'bf_02full_course_fee' => $bf_02full_course_fee,
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}
?>