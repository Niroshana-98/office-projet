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
        a.app_no, a.reason, a.name_si, a.name_full, a.name_eng, a.nic, a.address_pri, a.tel_land, a.tel_mob, a.email_pri, 
        a.service, a.grade, a.upp_status, a.desi, a.c_w_p, a.min, a.date_att_sp, a.ins_name, a.course_name, 
        a.service_minite_no, a.course_start_date, a.course_end_date, a.course_fee, a.before_recieved, 
        a.bf_01course_name, a.bf_01ins_name, a.bf_01start_date, a.bf_01gov_paid, a.bf_01full_course_fee, 
        a.bf_02course_name, a.bf_02ins_name, a.bf_02start_date, a.bf_02gov_paid, a.bf_02full_course_fee, 
        a.up_porva_anu, a.up_service_minite, a.up_app_letter_confirm, a.up_attach_sp, a.up_course_selected, 
        a.up_campus_confirm, a.up_course_complete, a.up_pay_recept, a.up_other,
        s.service_name, g.grade_name, d.desi_name, m.min_name,
        o.offi_id, o.offi_name, a.created,a.offi_cat,
        a.Subject_time_stamp, u1.name AS subject_officer_name, u1.desi AS designation,  a.Subject_Aprv_Rm,
        a.office_Rec_time_stamp, u2.name AS recommend_officer_name, u2.desi AS recDesignation, a.office_Rec_Aprv_RM, a.office_Rec_Recommend,
        a.Office_head_time_stamp, u3.name AS office_head_name, u3.desi AS offiHeadDesignation, a.Office_head_Aprv_RM, a.office_head_Recommend,
        a.Dist_Chk_Offi_time_stamp, u4.name AS dist_chk_officer_name, u4.desi AS distChkOffiDesignation, a.Dist_Chk_Offi_Aprv_Rm,
        a.Dist_Rec_Offi_time_stamp, u5.name AS dist_rec_officer_name, u5.desi AS distRecOffiDesignation, a.Dist_Rec_Offi_Aprv_Rm, a.Dist_Rec_Offi_Recommend	,
        a.Dist_offi_head_time_stamp	, u6.name AS dist_offi_head_name, u6.desi AS distOffiHeadDesignation, a.Dist_offi_head_Aprv_RM, a.Dist_offi_head_Recommend,
        a.Dep_Rec_Offi_time_stamp , u8.name AS dep_rec_officer_name, u8.desi AS depRecOffiDesignation, a.Dep_Rec_Offi_Reject_RM 
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
        users u1
    ON
        a.Subject_user_id = u1.user_id
    LEFT JOIN
        users u2
    ON
        a.office_Rec_user_id = u2.user_id
    LEFT JOIN
        users u3
    ON
        a.Office_head_user_id = u3.user_id
    LEFT JOIN
        users u4
    ON
        a.Dist_Chk_Offi_user_id = u4.user_id
    LEFT JOIN
        users u5
    ON
        a.Dist_Rec_Offi_user_id = u5.user_id
    LEFT JOIN
        users u6
    ON
        a.Dist_offi_head_user_id = u6.user_id
    LEFT JOIN
        users u8
    ON
        a.Dep_Rec_Offi_user_id = u8.user_id
    WHERE 
        a.app_no = ?
");

$stmt->bind_param("s", $app_no);
$stmt->execute();
$stmt->bind_result(
    $appNo,  $reason, $nameSi, $nameFull, $nameEng, $nic, $addressPri, $telLand, $telMob, $emailPri, 
    $service, $grade, $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, 
    $service_minite_no, $course_start_date, $course_end_date, $course_fee, $before_recieved, 
    $bf_01course_name, $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, 
    $bf_02course_name, $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee, 
    $up_porva_anu, $up_service_minite, $up_app_letter_confirm, $up_attach_sp, $up_course_selected, 
    $up_campus_confirm, $up_course_complete, $up_pay_recept, $up_other, 
    $service_name, $grade_name, $desi_name, $min_name, $offi_id, $offi_name, $created, $offi_cat,
    $Subject_time_stamp, $subject_officer_name, $designation, $Subject_Aprv_Rm, $office_Rec_time_stamp,
    $recommend_officer_name, $recDesignation, $office_Rec_Aprv_RM, $office_Rec_Recommend,
    $Office_head_time_stamp, $office_head_name, $offiHeadDesignation, $Office_head_Aprv_RM, $office_head_Recommend,
    $Dist_Chk_Offi_time_stamp, $dist_chk_officer_name, $distChkOffiDesignation, $Dist_Chk_Offi_Aprv_Rm,
    $Dist_Rec_Offi_time_stamp, $dist_rec_officer_name, $distRecOffiDesignation, $Dist_Rec_Offi_Aprv_Rm, $Dist_Rec_Offi_Recommend,
    $Dist_offi_head_time_stamp	, $dist_offi_head_name, $distOffiHeadDesignation, $Dist_offi_head_Aprv_RM, $Dist_offi_head_Recommend,
    $Dep_Rec_Offi_time_stamp , $dep_rec_officer_name, $depRecOffiDesignation, $Dep_Rec_Offi_Reject_RM
    

);

$stmt->fetch();
$stmt->close();


if ($appNo) {
    echo json_encode([
        'success' => true,
        'app_no' => $appNo,
        'reason' => $reason,
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
        'created' => $created,
        'offi_cat' => $offi_cat,
        'Subject_time_stamp' => $Subject_time_stamp,
        'subject_officer_name' => $subject_officer_name,
        'designation' => $designation,
        'Subject_Aprv_Rm' => $Subject_Aprv_Rm,
        'office_Rec_time_stamp' => $office_Rec_time_stamp,
        'recommend_officer_name' => $recommend_officer_name,
        'recDesignation' => $recDesignation,
        'office_Rec_Aprv_RM' => $office_Rec_Aprv_RM,
        'office_Rec_Recommend' => $office_Rec_Recommend,
        'Office_head_time_stamp' => $Office_head_time_stamp,
        'office_head_name' => $office_head_name,
        'offiHeadDesignation' => $offiHeadDesignation,
        'Office_head_Aprv_RM' => $Office_head_Aprv_RM,
        'office_head_Recommend' => $office_head_Recommend,
        'Dist_Chk_Offi_time_stamp' => $Dist_Chk_Offi_time_stamp,
        'dist_chk_officer_name' => $dist_chk_officer_name,
        'distChkOffiDesignation' => $distChkOffiDesignation,
        'Dist_Chk_Offi_Aprv_Rm' => $Dist_Chk_Offi_Aprv_Rm,
        'Dist_Rec_Offi_time_stamp' => $Dist_Rec_Offi_time_stamp,
        'dist_rec_officer_name' => $dist_rec_officer_name,
        'distRecOffiDesignation' => $distRecOffiDesignation,
        'Dist_Rec_Offi_Aprv_Rm' => $Dist_Rec_Offi_Aprv_Rm,
        'Dist_Rec_Offi_Recommend' => $Dist_Rec_Offi_Recommend,
        'Dist_offi_head_time_stamp' => $Dist_offi_head_time_stamp, 
        'dist_offi_head_name' => $dist_offi_head_name,
        'distOffiHeadDesignation' => $distOffiHeadDesignation,
        'Dist_offi_head_Aprv_RM' => $Dist_offi_head_Aprv_RM,
        'Dist_offi_head_Recommend' => $Dist_offi_head_Recommend,
        'Dep_Rec_Offi_time_stamp' => $Dep_Rec_Offi_time_stamp,
        'dep_rec_officer_name' => $dep_rec_officer_name,
        'depRecOffiDesignation' => $depRecOffiDesignation,
        'Dep_Rec_Offi_Reject_RM' => $Dep_Rec_Offi_Reject_RM

    ]); 
} else {
    echo json_encode(['success' => false, 'error' => 'Application number not found']);
}
?>

