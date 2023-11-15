<?php
$UserName = $_POST['UserName'];
$Full_Name = $_POST['Full_Name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword']; // New field for confirm password
$number = $_POST['number'];

// Check if passwords match
if ($password != $confirmPassword) {
    echo "Error: Passwords do not match.";
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(UserName, Full_Name, gender, email, password, confirmPassword, number) values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $UserName, $Full_Name, $gender, $email, $password, $confirmPassword, $number);
    $execval = $stmt->execute();
    if ($execval) {
        // Registration was successful
        echo "You are successfully registered. <br>";
        echo '<a href="../view/login.html"><button>Log in</button></a>';
    } else {
        echo "Error during registration.";
    }
    $stmt->close();
    $conn->close();
}
?>



