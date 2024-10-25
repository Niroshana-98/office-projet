<?php
session_start();
require 'connect.php'; // Ensure your database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // FETCH DATA LOGIC
    if (!isset($_SESSION['nic'])) {
        echo json_encode(['error' => 'User not logged in']);
        exit();
    }

    $nic = $_SESSION['nic'];

    // Fetch user data based on NIC
    $stmt = $conn->prepare("SELECT service, grade, desi FROM users WHERE nic = ?");
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo json_encode(['error' => 'No user data found']);
        exit();
    }
    $stmt->close();

    // Fetch ministries from the ministry table
    $ministry_stmt = $conn->prepare("SELECT min_id, min_name FROM ministry");
    $ministry_stmt->execute();
    $ministries_result = $ministry_stmt->get_result();

    $ministries = [];
    if ($ministries_result->num_rows > 0) {
        while ($row = $ministries_result->fetch_assoc()) {
            $ministries[] = $row;
        }
    }
    $ministry_stmt->close();

    // Convert both user data and ministries to JSON format
    header('Content-Type: application/json');
    echo json_encode([
        'user' => $userData,
        'ministries' => $ministries
    ]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Assign POST values to variables
    $name_full = $_POST['fnameCell'];
    $name_si = $_POST['inameCell'];
    $name_eng = $_POST['ienameCell'];
    $nic = $_POST['nicCell'];
    $address_pri = $_POST['addressCell'];
    $tel_land = $_POST['telCell'];
    $tel_mob = $_POST['htelCell'];
    $email_pri = $_POST['emailCell'];
    $service = $_POST['serviceCell'];
    $grade = $_POST['gradeCell'];
    $upp_status = $_POST['permenantCell'];
    $desi = $_POST['jobCell'];
    $c_w_p = $_POST['locationCell'];
    $min = $_POST['ministryCell'];
    $date_att_sp = $_POST['includeDateCell'];
    $ins_name = $_POST['universityCell'];
    $course_name = $_POST['digreeCell'];
    $service_minite_no = $_POST['enoCell'];
    $course_start_date = $_POST['sDateCell'];
    $course_end_date = $_POST['eDateCell'];
    $course_fee = $_POST['provisionCell'];
    $before_recieved = $_POST['chargesCell'];
    $bf_01course_name = $_POST['courseName1Cell'];
    $bf_01ins_name = $_POST['universityName1Cell'];
    $bf_01start_date = $_POST['csDate1Cell'];
    $bf_01gov_paid = $_POST['loan1Cell'];
    $bf_01full_course_fee = $_POST['cFees1Cell'];
    $bf_02course_name = $_POST['courseName2Cell'];
    $bf_02ins_name = $_POST['universityName2Cell'];
    $bf_02start_date = $_POST['csDate2Cell'];
    $bf_02gov_paid = $_POST['loan2Cell'];
    $bf_02full_course_fee = $_POST['cFees2Cell'];

    // Check if the application for NIC or email already exists
    $stmt = $conn->prepare("SELECT * FROM application WHERE nic=? OR email_pri=?");
    $stmt->bind_param("ss", $nic, $email_pri);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['error' => 'Application with this NIC or email already exists']);
        exit();
    }
    $stmt->close();

    // Insert application data
    $insert_stmt = $conn->prepare("INSERT INTO application (name_full, name_si, name_eng, nic, address_pri, tel_land, tel_mob, email_pri, service, grade, upp_status, desi, c_w_p, min, date_att_sp, ins_name, course_name, service_minite_no, course_start_date, course_end_date, course_fee, before_recieved, bf_01course_name, bf_01ins_name, bf_01start_date, bf_01gov_paid, bf_01full_course_fee, bf_02course_name, bf_02ins_name, bf_02start_date, bf_02gov_paid, bf_02full_course_fee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $insert_stmt->bind_param("sssssssssssssssssssssssssssssss", $name_full, $name_si, $name_eng, $nic, $address_pri, $tel_land, $tel_mob, $email_pri, $service, $grade, $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, $service_minite_no, $course_start_date, $course_end_date, $course_fee, $before_recieved, $bf_01course_name, $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, $bf_02course_name, $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee);

    // Execute and check result
    if ($insert_stmt->execute()) {
        echo json_encode(['success' => 'Application submitted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to submit application']);
    }
    $insert_stmt->close();
}

$conn->close();
?>
