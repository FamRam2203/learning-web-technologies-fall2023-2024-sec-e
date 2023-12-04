<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email'];

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

        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>Home</title>";
        echo "</head>";
        echo "<body>";
        echo "<h2>Welcome, " . $data['name'] . "!</h2>";
        echo "<p>Email: " . $data['email'] . "</p>";
        echo "<p>Phone: 0" . $data['phone'] . "</p>";
        echo "<p>Password: " . $data['password'] . "</p>";
        echo "<a href='login.html'>Logout</a>"; // Assuming you have a logout script
        echo "</body>";
        echo "</html>";
    } else {
        // Handle the case where user data is not found
        echo "User data not found.";
    }
}
?>
