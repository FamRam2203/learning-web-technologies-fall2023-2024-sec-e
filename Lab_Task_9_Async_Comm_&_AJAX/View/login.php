<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'persondb');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from persons where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {
            // Set session variable for logged-in user
            $_SESSION['email'] = $email;

            header("Location: home.php");
            exit();
        } else {
            echo "Invalid Email or Password... Please try again!";
        }
    }
}
?>
