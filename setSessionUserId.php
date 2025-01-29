<?php
session_start();

if (isset($_POST['user_id'])) {
    $_SESSION['user_id'] = $_POST['user_id'];

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'No user_id provided']);
}
?>
