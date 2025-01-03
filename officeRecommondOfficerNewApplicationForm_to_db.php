<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json'); 

if (!isset($_SESSION['app_no'])) {
    echo json_encode(['success' => false, 'error' => 'Application number not found in session']);
    exit;
}

$app_no = $_SESSION['app_no'];

// Updated query to join with the corresponding tables to get names
$stmt = $conn->prepare("
    SELECT 
        a.app_no, a.name_si, a.name_full, a.name_eng, a.nic, a.address_pri, a.tel_land, a.tel_mob, a.email_pri, 
        a.service, a.grade, a.upp_status, a.desi, a.c_w_p, a.min, a.date_att_sp, a.ins_name, a.course_name, 
        a.service_minite_no, a.course_start_date, a.course_end_date, a.course_fee, a.before_recieved, 
        a.bf_01course_name, a.bf_01ins_name, a.bf_01start_date, a.bf_01gov_paid, a.bf_01full_course_fee, 
        a.bf_02course_name, a.bf_02ins_name, a.bf_02start_date, a.bf_02gov_paid, a.bf_02full_course_fee, 
        a.up_porva_anu, a.up_service_minite, a.up_app_letter_confirm, a.up_attach_sp, a.up_course_selected, 
        a.up_campus_confirm, a.up_course_complete, a.up_pay_recept, a.up_other,
        s.service_name, g.grade_name, d.desi_name, m.min_name,
        o.offi_id, o.offi_name, a.created , a.Subject_time_stamp,
        u.name AS subject_officer_name, u.desi AS designation,  a.Subject_Aprv_Rm
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
    LEFT JOIN
        users u
    ON
        a.Subject_user_id = u.user_id
    WHERE 
        a.app_no = ?
");

$stmt->bind_param("s", $app_no);
$stmt->execute();
$stmt->bind_result(
    $appNo, $nameSi, $nameFull, $nameEng, $nic, $addressPri, $telLand, $telMob, $emailPri, 
    $service, $grade, $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, 
    $service_minite_no, $course_start_date, $course_end_date, $course_fee, $before_recieved, 
    $bf_01course_name, $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, 
    $bf_02course_name, $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee, 
    $up_porva_anu, $up_service_minite, $up_app_letter_confirm, $up_attach_sp, $up_course_selected, 
    $up_campus_confirm, $up_course_complete, $up_pay_recept, $up_other, 
    $service_name, $grade_name, $desi_name, $min_name, $offi_id, $offi_name, $created, $Subject_time_stamp,
    $subject_officer_name, $designation, $Subject_Aprv_Rm
);

$stmt->fetch();
$stmt->close();

if ($appNo) {
    echo json_encode([
        'success' => true,
        'created' => $created,
        'app_no' => $appNo,
        'name_si' => $nameSi,
        'name_full' => $nameFull,
        'name_eng' => $nameEng,
        'nic' => $nic,
        'address_pri' => $addressPri, 
        'tel_land' => $telLand,
        'tel_mob' => $telMob,
        'email_pri' => $emailPri,
        'service' => $service_name, 
        'grade' => $grade_name, 
        'upp_status' => $upp_status,
        'desi' => $desi_name, 
        'c_w_p' => $offi_name, 
        'min' => $min_name,
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
        'up_other' => $up_other,
        'Subject_time_stamp' => $Subject_time_stamp,
        'subject_officer_name' => $subject_officer_name,
        'designation' => $designation,
        'Subject_Aprv_Rm' => $Subject_Aprv_Rm
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}
?>
