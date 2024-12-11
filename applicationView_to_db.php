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

// Adjust SQL query to join with the service table to fetch service_name
$stmt = $conn->prepare("
    SELECT 
        a.app_no, a.name_si, a.name_full, a.name_eng, a.nic, a.address_pri, a.tel_land, 
        a.tel_mob, a.email_pri, s.service_name, g.grade_name, a.upp_status, d.desi_name, 
        o.offi_name, m.min_name, a.date_att_sp, a.ins_name, a.course_name, a.service_minite_no, 
        a.course_start_date, a.course_end_date, a.course_fee, a.before_recieved, 
        a.bf_01course_name, a.bf_01ins_name, a.bf_01start_date, a.bf_01gov_paid, 
        a.bf_01full_course_fee, a.bf_02course_name, a.bf_02ins_name, a.bf_02start_date, 
        a.bf_02gov_paid, a.bf_02full_course_fee, a.up_porva_anu, a.up_service_minite, 
        a.up_app_letter_confirm, a.up_attach_sp, a.up_course_selected, a.up_campus_confirm, 
        a.up_course_complete, a.up_pay_recept, a.up_other
    FROM 
        application a
    LEFT JOIN 
        service s 
    ON 
        a.service = s.service_id
    LEFT JOIN 
        grade g
    ON
        a.grade = g.grade_id
    LEFT JOIN 
        desi d
    ON
        a.desi = d.desi_id
    LEFT JOIN 
        ministry m
    ON
        a.min = m.min_id
    LEFT JOIN 
        office o
    ON
        a.c_w_p = o.offi_id
    WHERE 
        a.nic = ?
");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result(
    $appNo, $nameSi, $nameFull, $nameEng, $nic, $addressPri, $telLand, $telMob, $emailPri, 
    $serviceName, $gradeName, $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, 
    $course_name, $service_minite_no, $course_start_date, $course_end_date, $course_fee, 
    $before_recieved, $bf_01course_name, $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, 
    $bf_01full_course_fee, $bf_02course_name, $bf_02ins_name, $bf_02start_date, 
    $bf_02gov_paid, $bf_02full_course_fee, $up_porva_anu, $up_service_minite, 
    $up_app_letter_confirm, $up_attach_sp, $up_course_selected, $up_campus_confirm, 
    $up_course_complete, $up_pay_recept, $up_other
);
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
        'service_name' => $serviceName,
        'grade' => $gradeName,
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
        'up_porva_anu' => $up_porva_anu,
        'up_service_minite' => $up_service_minite,
        'up_app_letter_confirm' => $up_app_letter_confirm,
        'up_attach_sp' => $up_attach_sp,
        'up_course_selected' => $up_course_selected,
        'up_campus_confirm' => $up_campus_confirm,
        'up_course_complete' => $up_course_complete,
        'up_pay_recept' => $up_pay_recept,
        'up_other' => $up_other
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}
?>
