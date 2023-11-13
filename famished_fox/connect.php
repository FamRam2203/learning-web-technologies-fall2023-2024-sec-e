<html>
<head>
    <title>Signup</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">
    <ul class="navbar" style="list-style-type: none; margin: 0; padding: 0; background-color: black; overflow: hidden;">
        <li>
              <img src="logo.jpg" alt="Famished Logo" style="height: 100px;">
        </li>
    </ul>
</body>
</html>


<?php
$UserName = $_POST['UserName'];
$Full_Name = $_POST['Full_Name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(UserName, Full_Name, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $UserName, $Full_Name, $gender, $email, $password, $number);
    $execval = $stmt->execute();
    if ($execval) {
        // Registration was successful
        echo "You are successfully registered. <br>";
        echo '<a href="login.html"><button>Log in</button></a>';
    } else {
        echo "Error during registration.";
    }
    $stmt->close();
    $conn->close();
}
?>


