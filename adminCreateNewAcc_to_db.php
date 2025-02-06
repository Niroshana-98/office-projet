<?php
require 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'fetchOffices') {
    $query = "SELECT offi_id, offi_name FROM office";
    $result = mysqli_query($conn, $query);

    $offices = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $offices[] = $row;
    }
    echo json_encode($offices); 
    exit;
}

// Handle User Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action'])) {
    $nic = $_POST['nic'] ?? '';
    $office = $_POST['office'] ?? '';
    $password = $_POST['password'] ?? '';
    $position = $_POST['position'] ?? '';

    if (empty($nic) || empty($office) || empty($password) || empty($position)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    // Correcting status assignment
    $statusMap = [
        "position1" => 19, // Office Head
        "position2" => 31, // District Office Head
        "position3" => 43, // Department Head
        "position4" => 55, // Ministry Head
        "position5" => 59, // CS Check Officer
        "position6" => 63, // AO
        "position7" => 67, // ACS
        "position8" => 71, // DCS
        "position9" => 75, // CS
        "position10" => 79, // Accountant 1
        "position11" => 83  // Accountant 2
    ];

    $status = $statusMap[$position] ?? 14; // Default to 14 if not found

    // Hash the password securely
    $hashed_password = md5($password);

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE nic = ?");
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "A user with this NIC already exists."]);
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (nic, offi_id, password, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $nic, $office, $hashed_password, $status);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "New user created successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
        }
    }

    $stmt->close();
}

$conn->close();
?>
