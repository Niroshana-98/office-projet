<?php
session_start();

if (isset($_POST['app_no'])) {
    $_SESSION['app_no'] = $_POST['app_no'];

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'No app_no provided']);
}
?>
