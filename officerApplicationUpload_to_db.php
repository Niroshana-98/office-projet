<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure the NIC is set in the session
if (!isset($_SESSION['nic'])) {
    echo json_encode(['success' => false, 'error' => 'NIC not found in session']);
    exit;
}

$nic = $_SESSION['nic'];

$appNo = null;
$stmt = $conn->prepare("SELECT app_no FROM application WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$stmt->bind_result($appNo);
$stmt->fetch();
$stmt->close();

// Check if app_no was found
if ($appNo === null) {
    echo json_encode(['success' => false, 'error' => 'Application number not found for the given NIC']);
    exit;
}

// Helper function to handle file upload and database update
function handleFileUpload($fileKey, $uploadDir, $dbColumn, $conn, $appNo) {
    if (!isset($_FILES[$fileKey])) {
        return ['success' => false, 'error' => 'No file uploaded'];
    }

    $file = $_FILES[$fileKey];
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    
    // Generate unique file name based on app_no
    $newFileName = '';

    switch ($dbColumn) {
        case 'up_porva_anu':
            $newFileName = "porva_anu_$appNo.$fileExtension";
            break;
        case 'up_service_minite':
            $newFileName = "service_minite_$appNo.$fileExtension";
            break;
        case 'up_app_letter_confirm':
            $newFileName = "app_letter_confirm_$appNo.$fileExtension";
            break;
        case 'up_attach_sp':
            $newFileName = "attach_sp_$appNo.$fileExtension";
            break;
        case 'up_course_selected':
            $newFileName = "course_selected_$appNo.$fileExtension";
            break;
        case 'up_campus_confirm':
            $newFileName = "campus_confirm_$appNo.$fileExtension";
            break;
        case 'up_course_complete':
            $newFileName = "course_complete_$appNo.$fileExtension";
            break;
        case 'up_pay_recept':
            $newFileName = "pay_recept_$appNo.$fileExtension";
            break;
        case 'up_other':
            $newFileName = "other_$appNo.$fileExtension";
            break;
        default:
            return ['success' => false, 'error' => 'Invalid database column'];
    }

    $filePath = $uploadDir . $newFileName;
    $allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];

    // Check file type
    if (!in_array($file['type'], $allowedTypes)) {
        return ['success' => false, 'error' => 'Invalid file type'];
    }

    // Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $filePath)) {
        return ['success' => false, 'error' => 'File move failed'];
    }

    // Update database with the new file path
    $stmt = $conn->prepare("UPDATE application SET $dbColumn = ? WHERE app_no = ?");
    if (!$stmt) {
        return ['success' => false, 'error' => 'Database statement preparation failed'];
    }

    $stmt->bind_param("ss", $filePath, $appNo);
    
    if ($stmt->execute()) {
        $stmt->close();
        return ['success' => true, 'filePath' => $filePath];
    } else {
        $stmt->close();
        return ['success' => false, 'error' => 'Database update failed: ' . $conn->error];
    }
}

$response = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['up_porva_anu'])) {
        $response = handleFileUpload('up_porva_anu', 'uploads/up_porva_anu/', 'up_porva_anu', $conn, $appNo);
    } elseif (isset($_FILES['up_service_minite'])) {
        $response = handleFileUpload('up_service_minite', 'uploads/up_service_minite/', 'up_service_minite', $conn, $appNo);
    } elseif (isset($_FILES['up_app_letter_confirm'])) {
        $response = handleFileUpload('up_app_letter_confirm', 'uploads/up_app_letter_confirm/', 'up_app_letter_confirm', $conn, $appNo);
    } elseif (isset($_FILES['up_attach_sp'])) {
        $response = handleFileUpload('up_attach_sp', 'uploads/up_attach_sp/', 'up_attach_sp', $conn, $appNo);
    } elseif (isset($_FILES['up_course_selected'])) {
        $response = handleFileUpload('up_course_selected', 'uploads/up_course_selected/', 'up_course_selected', $conn, $appNo);
    } elseif (isset($_FILES['up_campus_confirm'])) {
        $response = handleFileUpload('up_campus_confirm', 'uploads/up_campus_confirm/', 'up_campus_confirm', $conn, $appNo);
    } elseif (isset($_FILES['up_course_complete'])) {
        $response = handleFileUpload('up_course_complete', 'uploads/up_course_complete/', 'up_course_complete', $conn, $appNo);
    } elseif (isset($_FILES['up_pay_recept'])) {
        $response = handleFileUpload('up_pay_recept', 'uploads/up_pay_recept/', 'up_pay_recept', $conn, $appNo);
    } elseif (isset($_FILES['up_other'])) {
        $response = handleFileUpload('up_other', 'uploads/up_other/', 'up_other', $conn, $appNo);
    } else {
        $response = ['success' => false, 'error' => 'Invalid request'];
    }
} else {
    $response = ['success' => false, 'error' => 'Invalid request method'];
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
