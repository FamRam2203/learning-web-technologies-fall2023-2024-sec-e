<?php
session_start(); // Start the session if it's not already started

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure the request method is POST to prevent accidental deletions

    if (isset($_SESSION['UserName'])) {
        $UserName = $_SESSION['UserName'];

        $con = new mysqli("localhost", "root", "", "test");

        if ($con->connect_error) {
            die("Failed to connect: " . $con->connect_error);
        } else {
            // Prepare and execute the SQL query to delete the user's profile
            $stmt = $con->prepare("DELETE FROM registration WHERE UserName = ?");
            $stmt->bind_param("s", $UserName);
            if ($stmt->execute()) {
                // Profile deleted successfully
                session_unset(); // Unset all session variables
                session_destroy(); // Destroy the session
                echo "Profile deleted successfully.";
            } else {
                echo "Error deleting profile: " . $stmt->error;
            }

            $stmt->close();
            $con->close();
        }
    } else {
        echo "User session not found. Please log in and try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Your HTML and styling code here -->
</head>
<body>
    <!-- Add a confirmation form here with a "Delete" button -->
    <form method="post">
        <p>Are you sure you want to delete your profile?</p>
        <button type="submit">Delete</button>
    </form>
</body>
</html>
