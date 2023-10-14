<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <?php
    $username = $password = "";
    $usernameErr = $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);

        if (empty($username)) {
            $usernameErr = "Username is required.";
        } elseif (!preg_match("/^[A-Za-z0-9_.-]{2,}$/", $username)) {
            $usernameErr = "Username must contain at least two alphanumeric characters, periods, dashes, or underscores.";
        }

        if (empty($password)) {
            $passwordErr = "Password is required.";
        } elseif (strlen($password) < 8) {
            $passwordErr = "Password must contain at least 8 characters.";
        } elseif (!preg_match("/[@#$%]/", $password)) {
            $passwordErr = "Password must contain at least one of the special characters (@, #, $, %).";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset>
        <legend>LOGIN</legend>
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
        <span class="error"><?php echo $usernameErr; ?></span><br><br>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
        <span class="error"><?php echo $passwordErr; ?></span><br><br>

        <hr>

        <label for="remember">Remember me:</label>
        <input type="checkbox" id="remember" name="remember"><br><br>

        <input type="submit" value="Login">
        <a href="forgot_password.php">Forgot password?</a>
    </fieldset>
       
    </form>
</body>
</html>
