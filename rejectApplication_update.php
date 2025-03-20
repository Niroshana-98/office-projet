<?php
session_start();  
require 'connect.php';

$nic = isset($_SESSION['nic']) ? mysqli_real_escape_string($conn, $_SESSION['nic']) : '';

$fields = [
    'reason', 'address_pri', 'tel_mob', 'date_att_sp', 'ins_name', 'course_name', 'service_minite_no',
    'course_start_date', 'course_end_date', 'course_fee',
    'bf_01course_name', 'bf_01ins_name', 'bf_01start_date', 'bf_01gov_paid', 'bf_01full_course_fee',
    'bf_02course_name', 'bf_02ins_name', 'bf_02start_date', 'bf_02gov_paid', 'bf_02full_course_fee'
];

$data = [];
foreach ($fields as $field) {
    $data[$field] = isset($_POST[$field]) ? mysqli_real_escape_string($conn, $_POST[$field]) : null;
}

if ($nic) {
    // Update application table
    $sql = "
    UPDATE application 
    SET reason = ?, address_pri = ?, tel_mob = ?, date_att_sp = ?, ins_name = ?, course_name = ?, service_minite_no = ?, 
        course_start_date = ?, course_end_date = ?, course_fee = ?, 
        bf_01course_name = ?, bf_01ins_name = ?, bf_01start_date = ?, bf_01gov_paid = ?, bf_01full_course_fee = ?, 
        bf_02course_name = ?, bf_02ins_name = ?, bf_02start_date = ?, bf_02gov_paid = ?, bf_02full_course_fee = ? 
    WHERE nic = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "issssssssssssssssssss", 
        $data['reason'], $data['address_pri'], $data['tel_mob'], $data['date_att_sp'], $data['ins_name'], $data['course_name'], 
        $data['service_minite_no'], $data['course_start_date'], $data['course_end_date'], $data['course_fee'],
        $data['bf_01course_name'], $data['bf_01ins_name'], $data['bf_01start_date'], 
        $data['bf_01gov_paid'], $data['bf_01full_course_fee'], $data['bf_02course_name'], $data['bf_02ins_name'], 
        $data['bf_02start_date'], $data['bf_02gov_paid'], $data['bf_02full_course_fee'], $nic
    );

    if ($stmt->execute()) {
        // Update users table status to 4
        $userSql = "UPDATE users SET status = 4 WHERE nic = ?";
        $userStmt = $conn->prepare($userSql);
        $userStmt->bind_param("s", $nic);

        // Update application table status to 2
        $appStatusSql = "UPDATE application SET app_status = 2 WHERE nic = ?";
        $appStatusStmt = $conn->prepare($appStatusSql);
        $appStatusStmt->bind_param("s", $nic);

        if ($userStmt->execute() && $appStatusStmt->execute()) {
            echo "success";
        } else {
            echo "error: Failed to update status.";
        }

        $userStmt->close();
        $appStatusStmt->close();
    } else {
        echo "error: " . $stmt->error; 
    }

    $stmt->close();
} else {
    echo "error: Invalid input."; 
}

$conn->close();
?>
