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

$stmt = $conn->prepare("SELECT app_no, name_si, name_full, name_eng, nic, address_pri, tel_land, tel_mob, email_pri, service, grade, upp_status, desi, c_w_p, min, date_att_sp, ins_name, course_name, service_minite_no, course_start_date, course_end_date, course_fee, before_recieved, bf_01course_name, bf_01ins_name, bf_01start_date, bf_01gov_paid, bf_01full_course_fee, bf_02course_name, bf_02ins_name, bf_02start_date, bf_02gov_paid, bf_02full_course_fee, up_porva_anu, up_service_minite, up_app_letter_confirm, up_attach_sp, up_course_selected, up_campus_confirm, up_course_complete, up_pay_recept, up_other FROM application WHERE app_no = ?");
$stmt->bind_param("s", $app_no);
$stmt->execute();
$stmt->bind_result($appNo, $nameSi, $nameFull, $nameEng, $nic, $addressPri, $telLand, $telMob, $emailPri, $service, $grade, $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, $service_minite_no, $course_start_date, $course_end_date, $course_fee, $before_recieved, $bf_01course_name, $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, $bf_02course_name, $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee, $up_porva_anu, $up_service_minite, $up_app_letter_confirm, $up_attach_sp, $up_course_selected, $up_campus_confirm, $up_course_complete, $up_pay_recept, $up_other);
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
