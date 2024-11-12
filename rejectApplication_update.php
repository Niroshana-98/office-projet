<?php
session_start();  // Start the session to get NIC

include('connect.php');

// Get NIC from session (it should be set after login)
$nic = isset($_SESSION['nic']) ? mysqli_real_escape_string($conn, $_SESSION['nic']) : '';

// Get the service_minite_no from POST
$service_minite_no = isset($_POST['service_minite_no']) ? mysqli_real_escape_string($conn, $_POST['service_minite_no']) : '';

// Validate NIC and service_minite_no
if ($nic && $service_minite_no) {
    // Prepare SQL query to update based on NIC (primary key)
    $sql = "UPDATE application SET service_minite_no = ? WHERE nic = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $service_minite_no, $nic);

    if ($stmt->execute()) {
        echo "success";  // Successfully updated
    } else {
        echo "error: " . $stmt->error;  // Error occurred
    }

    $stmt->close();
} else {
    echo "error: Invalid input.";  // If NIC or service_minite_no is empty or invalid
}

$conn->close();
?>
