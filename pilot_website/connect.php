<?php

    $UserName = $_POST['UserName'];
    $Full_Name = $_POST['Full_Name'];
    $gender = $_POST['gender'];
    $UserType = $_POST['UserType'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $stmt = $conn->prepare("insert into registration(UserName, Full_Name, gender, UserType, email, password, number) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssi", $UserName, $Full_Name, $gender, $UserType, $email, $password, $number);
		$execval = $stmt->execute();
		if ($execval) {
            // Registration was successful
            echo "You are successfully registered. <br>";
            echo '<button><a href="login.html">Now Login</a></button>';
        } else {
            echo "Error during registration.";
        }
		$stmt->close();
		$conn->close();
	}
    
?>