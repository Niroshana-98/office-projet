<?php
session_start();
require 'connect.php';

$response = []; // Initialize response array

$nic = isset($_SESSION['nic']) ? mysqli_real_escape_string($conn, $_SESSION['nic']) : '';

$fields = [
    'address_pri', 'tel_mob', 'date_att_sp', 'ins_name', 'course_name', 'service_minite_no',
    'course_start_date', 'course_end_date', 'course_fee',
    'bf_01course_name', 'bf_01ins_name', 'bf_01start_date', 'bf_01gov_paid', 'bf_01full_course_fee',
    'bf_02course_name', 'bf_02ins_name', 'bf_02start_date', 'bf_02gov_paid', 'bf_02full_course_fee'
];

$data = [];
foreach ($fields as $field) {
    $data[$field] = isset($_POST[$field]) ? trim(mysqli_real_escape_string($conn, $_POST[$field])) : '';
}

if ($nic) {
    // Update application table
    $sql = "
    UPDATE application 
    SET address_pri = ?, tel_mob = ?, date_att_sp = ?, ins_name = ?, course_name = ?, service_minite_no = ?, 
        course_start_date = ?, course_end_date = ?, course_fee = ?, 
        bf_01course_name = ?, bf_01ins_name = ?, bf_01start_date = ?, bf_01gov_paid = ?, bf_01full_course_fee = ?, 
        bf_02course_name = ?, bf_02ins_name = ?, bf_02start_date = ?, bf_02gov_paid = ?, bf_02full_course_fee = ? 
    WHERE nic = ?";
    
    $stmtUpdate = $conn->prepare($sql);
    if (!$stmtUpdate) {
        $response['error'] = "Prepare failed: " . $conn->error;
        echo json_encode($response);
        exit();
    }

    $stmtUpdate->bind_param(
        "ssssssssssssssssssss", 
        $data['address_pri'], $data['tel_mob'], $data['date_att_sp'], $data['ins_name'], $data['course_name'], 
        $data['service_minite_no'], $data['course_start_date'], $data['course_end_date'], $data['course_fee'],
        $data['bf_01course_name'], $data['bf_01ins_name'], $data['bf_01start_date'], 
        $data['bf_01gov_paid'], $data['bf_01full_course_fee'], $data['bf_02course_name'], $data['bf_02ins_name'], 
        $data['bf_02start_date'], $data['bf_02gov_paid'], $data['bf_02full_course_fee'], $nic
    );

    if ($stmtUpdate->execute()) {
        $stmtUpdate->close();

        // Retrieve user status and office ID from users table
        $stmtUser = $conn->prepare("SELECT status, offi_id FROM users WHERE nic = ?");
        if (!$stmtUser) {
            $response['error'] = "Prepare failed: " . $conn->error;
            echo json_encode($response);
            exit();
        }

        $stmtUser->bind_param("s", $nic);
        $stmtUser->execute();
        $stmtUser->bind_result($status, $offi_id);
        $stmtUser->fetch();
        $stmtUser->close();

        if ($offi_id) {
            // Retrieve office category from office table
            $stmtOffice = $conn->prepare("SELECT offi_cat FROM office WHERE offi_id = ?");
            if (!$stmtOffice) {
                $response['error'] = "Prepare failed: " . $conn->error;
                echo json_encode($response);
                exit();
            }

            $stmtOffice->bind_param("i", $offi_id);
            $stmtOffice->execute();
            $stmtOffice->bind_result($offi_cat);
            $stmtOffice->fetch();
            $stmtOffice->close();

            // Determine new app_status based on status & offi_cat
            $statusMap = [
                10 => [6 => 150, 5 => 140, 4 => 130, 3 => 120, 2 => 110, 1 => 100],
                18 => [5 => 144, 6 => 154],
                22 => [5 => 134, 6 => 124],
                26 => [4 => 130],
                30 => [4 => 138],
                34 => [4 => 124],
                38 => [3 => 120],
                42 => [3 => 128],
                46 => [3 => 114],
                50 => [2 => 110],
                54 => [2 => 118],
                58 => [2 => 100]
            ];

            $newAppStatus = $statusMap[$status][$offi_cat] ?? null;

            if ($newAppStatus) {
                // Update application status
                $stmtApp = $conn->prepare("UPDATE application SET app_status = ?, created = NOW() WHERE nic = ?");
                if (!$stmtApp) {
                    $response['error'] = "Prepare failed: " . $conn->error;
                    echo json_encode($response);
                    exit();
                }

                $stmtApp->bind_param("is", $newAppStatus, $nic);
                if ($stmtApp->execute() && $stmtApp->affected_rows > 0) {
                    $response['success'] = true;
                } else {
                    $response['error'] = 'Failed to update application status.';
                }

                $stmtApp->close();
            } else {
                $response['error'] = 'No matching conditions for status and office category.';
            }
        } else {
            $response['error'] = 'User office ID not found.';
        }
    } else {
        $response['error'] = "Error updating application: " . $stmtUpdate->error;
    }
} else {
    $response['error'] = "Invalid input.";
}

$conn->close();
echo json_encode($response);
?>
