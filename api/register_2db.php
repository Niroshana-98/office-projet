<?php
require 'connect.php';

// Handle AJAX requests for fetching data
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

        //Fetch Services
        if($action === 'fetchGrades' && isset($_POST['service_id'])){
            $service_id = $_POST['service_id'];
            $query = "SELECT grade_id, grade_name FROM grade WHERE service_id =?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $service_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['grade_id'].'">'.$row['grade_name'].'</option>';
            }
        exit;
        }
    }
}

//handle registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $service = $_POST['service'];
    $grade = $_POST['grade'];
    $position = $_POST['position'];
    $password = $_POST['inputPassword'];
    $confirm_password = $_POST['inputConfirmPassword'];

    // Convert password to MD5
    $hashed_password = md5($password);

    // Check for existing user
    $stmt = $conn->prepare("SELECT * FROM users WHERE nic=? OR email=?");
    $stmt->bind_param("ss", $nic, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('A user with this NIC or email already exists.');</script>";
    } else {
        // Prepare statement for insertion
        $stmt = $conn->prepare("INSERT INTO users (name, nic, email, tel, service, grade, position, password) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $nic, $email, $tel, $service, $grade, $position, $hashed_password);

        if ($stmt->execute()) {
            // Successful registration
            echo "<script>alert('Registration Successfully!'); window.location.href = '../index.html';</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
    }

    $stmt->close();
}


$conn->close();
?>
