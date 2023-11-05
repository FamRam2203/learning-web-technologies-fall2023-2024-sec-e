<!DOCTYPE html>
<html>
<head>
<style>
        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333;
            overflow: hidden;
        }

        ul.navbar li {
            float: left;
        }

        ul.navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.navbar li a:hover {
            background-color: #444;
        }

        ul.navbar li.right {
            float: right;
        }

        /* Content area styles */
        .content {
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.5s;
        }

        .background-div {
            background-image: url('fast_food.jpg');
            background-size: auto; /* Adjust this as needed */
            background-repeat: no-repeat;
            width: 100%;
            height: 200px; /* Adjust the height as needed */
        }
    </style>
</head>
<body>
    <ul class="navbar">
        <li>
            <a href="Login.html"><img src="logo.jpg" alt="Famished Logo" style="height: 100px;"></a>
        </li>
        <li><a href="#">Track Order</a></li>
        <li><a href="#">Past Orders</a></li>
        <li><a href="#">About Us</a></li>
        <li class="right"><a class="login-button" href="Login.html">Log Out</a></li>        
    </ul>

    <?php
    // Get the UserName parameter from the URL
    $UserName = $_GET['username'];

    $con = new mysqli("localhost", "root", "", "test");
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }

    // Prepare and execute a query to retrieve user information
    $stmt = $con->prepare("SELECT * FROM registration WHERE UserName = ?");
    $stmt->bind_param("s", $UserName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        // Display the user credentials
        echo "<h1>User Profile</h1>";
        echo "<p>Full Name: " . $userData['Full_Name'] . "</p>";
        echo "<p>User Name: " . $userData['UserName'] . "</p>";
        echo "<p>Gender: " . $userData['gender'] . "</p>"; // Add this line to display gender
        echo "<p>User Type: " . $userData['UserType'] . "</p>"; // Add this line to display UserType
        echo "<p>Email: " . $userData['email'] . "</p>";
        echo "<p>Password: " . $userData['password'] . "</p>";
        echo "<p>Mobile Number: " . $userData['number'] . "</p>";
    } else {
        echo "User not found";
    }

    $con->close();
    echo '<button onclick="location.href=\'edit_profile.php?username=' . $UserName . '\'">Edit Profile</button>';
    ?>
</body>
</html>
