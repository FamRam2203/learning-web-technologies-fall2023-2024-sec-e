<?php
$conn = new mysqli('localhost', 'root', '', 'persondb');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$email = $_POST['email'];

$stmt = $conn->prepare("SELECT email FROM persons WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo '<span style="color: red;">Email is not available</span>';
} else {
    echo '<span style="color: green;">Email is available</span>';
}

$stmt->close();
$conn->close();
?>
