<?php
session_start();
require 'connect.php';

//Get Data Users Table
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if user is logged in
    if (!isset($_SESSION['nic'])) {
        echo json_encode(['error' => 'User not logged in']);
        exit();
    }

    $nic = $_SESSION['nic'];

    // Fetch user data based on NIC
    $stmt = $conn->prepare("SELECT name, nic, email, tel, offi_id FROM users WHERE nic = ?");
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

    // Fetch Office Name
    $offi_id = $userData['offi_id'];
    $office_stmt = $conn->prepare("SELECT offi_name FROM office WHERE offi_id = ?");
    $office_stmt->bind_param("i", $offi_id);
    $office_stmt->execute();
    $office_result = $office_stmt->get_result();

    if ($office_result->num_rows > 0) {
        $officeData = $office_result->fetch_assoc();
        $userData['offi_name'] = $officeData['offi_name'];
    } else {
        $userData['offi_name'] = 'Unknown';
    }

    $office_stmt->close();

    // Fetch ministries from the ministry table
    $ministry_stmt = $conn->prepare("SELECT min_id, min_name FROM ministry");
    $ministry_stmt->execute();
    $ministries_result = $ministry_stmt->get_result();

    $ministries = [];
    while ($row = $ministries_result->fetch_assoc()) {
        $ministries[] = $row;
    } 

    $ministry_stmt->close();

    // Send a JSON response with both user data and ministries
    header('Content-Type: application/json');
    echo json_encode([
        'user' => $userData,
        'ministries' => $ministries
    ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Fetch services
        if ($action === 'fetchServices') {
            $query = "SELECT service_id, service_name FROM service";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['service_id'].'">'.$row['service_name'].'</option>';
            }
            exit;
        }

        // Fetch Grades
        if($action === 'fetchGrades' && isset($_POST['service_id'])){
            $service_id = $_POST['service_id'];
            $query = "SELECT grade_id, grade_name FROM grade WHERE service_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $service_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['grade_id'].'">'.$row['grade_name'].'</option>';
            }
            exit;
        }

        // Fetch Position
        if($action === 'fetchPositions' && isset($_POST['service_id'])){
            $grade_id = $_POST['service_id'];
            $query = "SELECT desi_id, desi_name FROM desi WHERE service_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $grade_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_assoc($result)){
                echo '<option value="'.$row['desi_id'].'">'.$row['desi_name'].'</option>';
            }
            exit;
        }
    }
}

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
    $c_w_p = $_POST['offi_id'];
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

    $app_status = "1";


    // Check for existing NIC or email
    $stmts = $conn->prepare("SELECT * FROM application WHERE nic=? OR email_pri=?");
    $stmts->bind_param("ss", $nic, $email_pri);
    $stmts->execute();
    $result = $stmts->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('A user with this NIC or email already exists.');</script>";
    } else {
        // Insert data into application table
        $stmts = $conn->prepare("INSERT INTO application (name_full, name_si, name_eng, nic, address_pri, tel_land, tel_mob, email_pri, service, grade, upp_status, desi, c_w_p, min, date_att_sp, ins_name, course_name, service_minite_no, course_start_date, course_end_date, course_fee, before_recieved, bf_01course_name, bf_01ins_name, bf_01start_date, bf_01gov_paid, bf_01full_course_fee, bf_02course_name, bf_02ins_name, bf_02start_date, bf_02gov_paid, bf_02full_course_fee, app_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmts->bind_param("sssssiisssssssssssssissssiisssiii", 
            $name_full, $name_si, $name_eng, $nic, $address_pri, $tel_land, $tel_mob, $email_pri, $service, $grade, 
            $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, $service_minite_no, 
            $course_start_date, $course_end_date, $course_fee, $before_recieved, $bf_01course_name, 
            $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, $bf_02course_name, 
            $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee, $app_status
        );

        if (!$stmts->execute()) {
            echo "Error: " . $stmts->error;
        } else {
            $update_stmt = $conn->prepare("UPDATE users SET status = ? WHERE nic = ?");
            $new_status = 3; 
            $update_stmt->bind_param("is", $new_status, $nic);
        
        if ($update_stmt->execute()) {
            echo "<script>alert('Data inserted successfully! Navigating to upload page.'); window.location.href='upload.php';</script>";
        } else {
            echo "Error updating user status: " . $update_stmt->error;
        }
        
        $update_stmt->close();
    }
}

$stmts->close();
}

$conn->close();
?>
