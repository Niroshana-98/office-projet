<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User ID not found in session']);
    exit;
}

include 'connect.php';

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['desi_id'], $data['position'])) {
    echo json_encode(['success' => false, 'error' => 'Missing data in request']);
    exit;
}

$desi_id = $data['desi_id'];
$position = $data['position'];
$user_id = $_SESSION['user_id'];

// Fetch desi_name from desi table
$desiStmt = $conn->prepare("SELECT desi_name FROM desi WHERE desi_id = ?");
$desiStmt->bind_param("i", $desi_id);
$desiStmt->execute();
$desiStmt->bind_result($desi_name);
$desiStmt->fetch();
$desiStmt->close();

if (!$desi_name) {
    echo json_encode(['success' => false, 'error' => 'Designation not found']);
    exit;
}

// Fetch offi_cat from office table using users' offi_id
$offiStmt = $conn->prepare("
    SELECT o.offi_cat 
    FROM users u
    LEFT JOIN office o ON u.offi_id = o.offi_id
    WHERE u.user_id = ?
");
$offiStmt->bind_param("s", $user_id);
$offiStmt->execute();
$offiStmt->bind_result($offi_cat);
$offiStmt->fetch();
$offiStmt->close();

// Determine new status based on position and offi_cat
$status = null;
if ($offi_cat == 6) {
    if ($position === "Subject Officer") {
        $status = 10;
    } elseif ($position === "Office Recommend Officer") {
        $status = 18;
    }
} else if ($offi_cat == 5) {
    if ($position === "Subject Officer") {
        $status = 10;
    } elseif ($position === "Office Recommend Officer") {
        $status = 18;
    }
} else if ($offi_cat == 4) {
    if ($position === "Subject Officer") {
        $status = 10;
    } elseif ($position === "District Check Officer") {
        $status = 26;
    } elseif ($position === "District Recommend Officer") {
        $status = 30;
    }
} else if ($offi_cat == 3) {
    if ($position === "Subject Officer") {
        $status = 10;
    } elseif ($position === "Department Check Officer") {
        $status = 38;
    } elseif ($position === "Department Recommend Officer") {
        $status = 42;
    }
} else if ($offi_cat == 2) {
    if ($position === "Subject Officer") {
        $status = 10;
    } elseif ($position === "Ministry Check Officer") {
        $status = 50;
    } elseif ($position === "Ministry Recommend Officer") {
        $status = 54;
    }
} 

// Update the desi column with desi_name in users table
if ($status !== null) {
    $updateStmt = $conn->prepare("UPDATE users SET desi = ?, status = ? WHERE user_id = ?");
    $updateStmt->bind_param("sis", $desi_name, $status, $user_id);
} else {
    $updateStmt = $conn->prepare("UPDATE users SET desi = ? WHERE user_id = ?");
    $updateStmt->bind_param("ss", $desi_name, $user_id);
}

// Execute update query
if ($updateStmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Database update failed: ' . $conn->error]);
}

$updateStmt->close();
$conn->close();
?>
