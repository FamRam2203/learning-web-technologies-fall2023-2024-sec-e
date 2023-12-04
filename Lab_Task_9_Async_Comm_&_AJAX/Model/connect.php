<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Check if the password matches confirm password
if ($password !== $confirmpassword) {
    die('Password and Confirm Password do not match.');
}

$conn = new mysqli('localhost', 'root', '', 'persondb');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into persons(name, phone, email, password, confirmpassword) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $phone, $email, $password, $confirmpassword);
    $stmt->execute();
    $stmt->close();
    $conn->close();    
    // Add a link/button to go to login page
    echo "The employee has been registered successfully. <a href='../view/login.html'>Go to Login</a>";
}
?>
