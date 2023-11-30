<?php
// Start the session
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

// ...

// Check if the username is not empty
if (!empty($UserName)) {
    // Fetch user's mobile number from the 'registration' table
    $numberQuery = "SELECT number FROM registration WHERE username = '$UserName'";
    
    // Check if the query string is not empty
    if (!empty($numberQuery)) {
        $result = $conn->query($numberQuery);

        // Check if the query execution was successful
        if ($result !== false) {
            if ($result->num_rows > 0) {
                // User found, fetch the mobile number
                $row = $result->fetch_assoc();
                $number = '0' . $row['number']; // Add '0' to the beginning
                echo $number;
            } else {
                // User not found
                echo "User not found";
            }
        } else {
            // Handle query execution error
            echo "Error executing query: " . $conn->error;
        }
    } else {
        // Handle empty query string error
        echo "Error: Query string is empty.";
    }
} else {
    // Handle empty username error
    echo "Error: Username is empty.";
}
?>
