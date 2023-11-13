<html>
<head>
    <title>Login</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">

<?php
    // Check if the form has been submitted and username is set in the session
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['UserName'])) {
        $username = $_SESSION['UserName'];
        echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Welcome, ' . $username . ', to admin panel!</div>';
    }
?>

    <ul style="list-style-type: none; margin: 0; padding: 0; background-color: black; overflow: hidden;">
        <li style="float: left;"><img src="logo.jpg" alt="Famished Logo" style="height: 100px;"></li>
        <li style="float: left;"><a href="http://localhost/phpmyadmin/index.php?route=/sql&db=test&table=registration&pos=0" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">View Customer</a></li>
        <li style="float: right;"><a class="logout-button" href="../model/Admin.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Logout</a></li>
    </ul>

    <div style="margin-left: 0; padding: 20px; transition: margin-left 0.5s;">
        <h2>Welcome to Admin Panel!</h2>
        <p>Here you can modify the database of customers and alter food items.</p>
    </div>
</body>
</html>
