<?php
include("../model/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM employers WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["username"] = $username;
            echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid username";
    }
}

$conn->close();
?>
 