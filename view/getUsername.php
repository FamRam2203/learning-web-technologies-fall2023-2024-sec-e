<?php
session_start();

// Replace these values with your actual database credentials
$db_username = 'root';
$db_password = '';
$db_host = 'localhost';
$db_name = 'test';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have the user's username stored in a variable $username
$UserName = isset($_SESSION['UserName']) ? $_SESSION['UserName'] : '';

// Check if the username is not empty
if (!empty($UserName)) {
    echo $UserName;
} else {
    echo "Guest";
}
?>
