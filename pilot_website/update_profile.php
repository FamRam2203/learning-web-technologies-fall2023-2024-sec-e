<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];
    //$newMobile = $_POST['newMobile'];
    
    $con = new mysqli("localhost", "root", "", "test");
    
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }
    
    // Check if the user exists before updating
    $stmt = $con->prepare("SELECT UserName FROM registration WHERE UserName = ?");
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, proceed with the update
        $stmt = $con->prepare("UPDATE registration SET UserName = ?, password = ? WHERE UserName = ?");
$stmt->bind_param("sss", $newUsername, $newPassword, $_POST['username']);
        
        if ($stmt->execute()) {
            // Update successful, redirect to login page
            header('Location: Login.html');
        } else {
            // Update failed, handle the error
            echo "Error updating profile: " . $stmt->error;
        }
    } else {
        // User not found, redirect to login page
        header('Location: Login.html');
    }
    
    $con->close();
}
?>
