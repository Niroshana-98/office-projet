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

    // Fetch user data along with office and ministry details in one go
    $stmt = $conn->prepare("
        SELECT 
            u.name, u.nic, u.email, u.tel, u.offi_id, o.offi_name, m.min_id, m.min_name
        FROM 
            users u
        LEFT JOIN 
            office o ON u.offi_id = o.offi_id
        LEFT JOIN 
            ministry m ON o.min_id = m.min_id
        WHERE 
            u.nic = ?
    ");
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        $userData['offi_name'] = $userData['offi_name'] ?? 'Unknown';
        $userData['min_name'] = $userData['min_name'] ?? 'Unknown';
        $userData['offi_id'] = $userData['offi_id'] ?? 'Unknown';
        $userData['min_id'] = $userData['min_id'] ?? 'Unknown';
    } else {
        echo json_encode(['error' => 'No user data found']);
        exit();
    }
    $stmt->close();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode(['user' => $userData]);
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
            $service_id = $_POST['service_id'];
            $query = "SELECT desi_id, desi_name FROM desi WHERE service_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $service_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_assoc($result)){
                echo '<option value="'.$row['desi_id'].'">'.$row['desi_name'].'</option>';
            }
            exit;
        }
    }
}

// Assuming you have included the database connection file and established a connection
// $conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect data from the POST request 
    $reason = isset($_POST['reason']) ? $_POST['reason'] : null;
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
    $min = $_POST['min_id'];
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

    $created = date('Y-m-d H:i:s');
    $app_status = "1";  // Initial application status

    // Additional variables for offi_cat and dist_offi_id
    $offi_cat = null;
    $dist_offi_id = null;
    $min_id = null;
    $dep_id = null ;

    // Fetch offi_cat and dist_offi_id from the office table
    $stmt_office = $conn->prepare("SELECT offi_cat, dist_offi_id, min_id, dep_id FROM office WHERE offi_id = ?");
    $stmt_office->bind_param("i", $c_w_p);
    $stmt_office->execute();
    $result_office = $stmt_office->get_result();

    if ($result_office->num_rows > 0) {
        $row_office = $result_office->fetch_assoc();
        $offi_cat = $row_office['offi_cat'];
        $dist_offi_id = $row_office['dist_offi_id'];
        $min_id = $row_office['min_id'];
        $dep_id = $row_office['dep_id'];
    } else {
        echo "<script>alert('Invalid office ID. Please check and try again.');</script>";
        exit;
    }

    $stmt_office->close();

    // Check for existing NIC or email
    $stmts = $conn->prepare("SELECT * FROM application WHERE nic=? OR email_pri=?");
    $stmts->bind_param("ss", $nic, $email_pri);
    $stmts->execute();
    $result = $stmts->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('A user with this NIC or email already exists.');</script>"; 
    } else {
        // Insert data into application table (including offi_cat and dist_offi_id)
        $stmts = $conn->prepare("INSERT INTO application (
            reason, name_full, name_si, name_eng, nic, address_pri, tel_land, tel_mob, email_pri, 
            service, grade, upp_status, desi, c_w_p, min, date_att_sp, ins_name, course_name, 
            service_minite_no, course_start_date, course_end_date, course_fee, before_recieved, 
            bf_01course_name, bf_01ins_name, bf_01start_date, bf_01gov_paid, bf_01full_course_fee, 
            bf_02course_name, bf_02ins_name, bf_02start_date, bf_02gov_paid, bf_02full_course_fee, created, 
            app_status, offi_cat, min_id, dep_id, dist_offi_id
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmts->bind_param(
            "isssssiisssssssssssssissssiisssiiiiiiii", 
            $reason, $name_full, $name_si, $name_eng, $nic, $address_pri, $tel_land, $tel_mob, $email_pri, 
            $service, $grade, $upp_status, $desi, $c_w_p, $min, $date_att_sp, $ins_name, $course_name, 
            $service_minite_no, $course_start_date, $course_end_date, $course_fee, $before_recieved, 
            $bf_01course_name, $bf_01ins_name, $bf_01start_date, $bf_01gov_paid, $bf_01full_course_fee, 
            $bf_02course_name, $bf_02ins_name, $bf_02start_date, $bf_02gov_paid, $bf_02full_course_fee, $created,
            $app_status, $offi_cat, $min_id, $dep_id, $dist_offi_id
        );     

        if (!$stmts->execute()) {
            echo "Error: " . $stmts->error;
        } else {
            
                echo "<script>alert('Data inserted successfully! Navigating to upload page.'); window.location.href='officerApplicationUpload.php';</script>";
        }

        $stmts->close();
    }
}
$conn->close();
?>
