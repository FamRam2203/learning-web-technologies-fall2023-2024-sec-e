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
    </ul>

    <?php
    // Retrieve the username from the query parameter
    $UserName = $_GET['username'];

    // Display a form for editing user profile information
    echo '<h1>Edit Profile</h1>';
    echo '<form method="post" action="update_profile.php">';
    echo '<input type="hidden" name="username" value="' . $UserName . '">';
    echo 'New Username: <input type="text" name="newUsername"><br>';
    echo 'New Password: <input type="password" name="newPassword"><br>';
    echo '<input type="submit" value="Save Changes">';
    echo '</form>';
    ?>
</body>
</html>
