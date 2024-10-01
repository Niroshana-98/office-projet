<?php
require 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST['name'];
    //$name = mysqli_real_escape_string($conn, $_POST['name']);
    $nic = mysqli_real_escape_string($conn, $_POST['nic']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $password = mysqli_real_escape_string($conn, $_POST['inputPassword']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['inputConfirmPassword']);


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_user = "SELECT * FROM users WHERE nic='$nic' OR email='$email'";
    $result = $conn->query($check_user);

    if ($result->num_rows > 0) {
        echo "A user with this NIC or email already exists.";
    } else{
        $sql = "INSERT INTO users (name, nic, email, tel, service, grade, position, password) 
                VALUES ('$name', '$nic', '$email', '$tel', '$service', '$grade', '$position', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            header("Location: ../index.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>