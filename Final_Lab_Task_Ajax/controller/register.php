<?php
include("../model/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $employer_name = $_POST["employer_name"];
    $company_name = $_POST["company_name"];
    $contact_no = $_POST["contact_no"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password) VALUES ('$employer_name', '$company_name', '$contact_no', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
