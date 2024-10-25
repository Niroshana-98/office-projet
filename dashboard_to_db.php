<?php
session_start();
require 'connect.php';

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
}
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect data from the POST request
    $name_full = $_POST['fname'];
    $name_si = $_POST['iname'];
    $name_eng = $_POST['iename'];
    $nic = $_POST['nic'];
    $address_pri = $_POST['address'];
    $tel_land = $_POST['tel'];
    $tel_mob = $_POST['htel'];
    $email_pri = $_POST['email'];
    $service = $_POST['service'];
    $grade = $_POST['grade'];
    $upp_status = $_POST['permenant'];
    $desi = $_POST['job'];
    $c_w_p = $_POST['location'];
    $min = $_POST['ministry'];
    $date_att_sp = $_POST['includeDate'];
    $ins_name = $_POST['university'];
    $course_name = $_POST['digree'];
    $service_minite_no = $_POST['eno'];
    $course_start_date = $_POST['sDate'];
    $course_end_date = $_POST['eDate'];
    $course_fee = $_POST['provision'];
    $before_recieved = $_POST['flexRadioDefault'];
    $bf_01course_name = $_POST['courseName1'];
    $bf_01ins_name = $_POST['universityName1'];
    $bf_01start_date = $_POST['csDate1'];
    $bf_01gov_paid = $_POST['loan1'];
    $bf_01full_course_fee = $_POST['cFees1'];
    $bf_02course_name = $_POST['courseName2'];
    $bf_02ins_name = $_POST['universityName2'];
    $bf_02start_date = $_POST['csDate2'];
    $bf_02gov_paid = $_POST['loan2'];
    $bf_02full_course_fee = $_POST['cFees2'];

    // Check for existing NIC or email
    $stmts = $conn->prepare("SELECT * FROM application WHERE nic=? OR email_pri=?");
    $stmts->bind_param("ss", $nic, $email_pri);
    $stmts->execute();
    $result = $stmts->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('A user with this NIC or email already exists.');</script>";
    } else {
        // Insert data into application table
        $stmts = $conn->prepare("INSERT INTO application (name_full, name_si, name_eng, nic, address_pri, tel_land, tel_mob, email_pri, service, grade, upp_status, desi, c_w_p, min, date_att_sp, ins_name, course_name, service_minite_no, course_start_date, course_end_date, course_fee, before_recieved, bf_01course_name, bf_01ins_name, bf_01start_date, bf_01gov_paid, bf_01full_course_fee, bf_02course_name, bf_02ins_name, bf_02start_date, bf_02gov_paid, bf_02full_course_fee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmts->bind_param("sssssiisssssssssssssissssiisssii", 
            $name_full, $name_si, $name_eng, $nic, $address_pri, $tel_land, $tel_mob, $email_pri, $service, $grade, 
            $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, $service_minite_no, 
            $course_start_date, $course_end_date, $course_fee, $before_recieved, $bf_01course_name, 
            $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, $bf_02course_name, 
            $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee
        );

        // Execute and check for errors
        if (!$stmts->execute()) {
            echo "Error: " . $stmts->error;
        } else {
            echo "<script>alert('Data inserted successfully!');</script>";
        }
    }
    $stmts->close();
}
*/
$conn->close();
?>
