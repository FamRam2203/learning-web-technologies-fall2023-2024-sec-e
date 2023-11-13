<html>
<head>
    <title>Login</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">
    <ul class="navbar" style="list-style-type: none; margin: 0; padding: 0; background-color: black; overflow: hidden;">
        <li>
              <img src="logo.jpg" alt="Famished Logo" style="height: 100px;">
        </li>
    </ul>
    <h2>Log In</h2>

    <?php
session_start();

// Define the passwords associated with each username
$passwords = [
    "Nokibul Arfin" => "1234",
    "Fahim Rahman" => "1357",
    "Abdullah Shahriar" => "5678",
    "Imam Jami" => "2468",
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserName = $_POST["username"];
    $enteredPassword = $_POST["password"];

    if (array_key_exists($UserName, $passwords) && $passwords[$UserName] === $enteredPassword) {
        $_SESSION['UserName'] = $UserName;
        echo "<p>Login successful for $UserName.</p>";
        header("Location: Edit.php");
        exit();
    } else {
        echo "<p>Login failed. Please check your username and password.</p>";
    }
}
?>
    <form method="post" action="" enctype="multipart/form-data">
        <fieldset style="width: 60%">
            <legend>Username</legend>

            <select name="username">
                <option value=""></option>
                <option value="Nokibul Arfin">Nokibul Arfin</option>
                <option value="Fahim Rahman">Fahim Rahman</option>
                <option value="Abdullah Shahriar">Abdullah Shahriar</option>
                <option value="Imam Jami">Imam Jami</option>
            </select> <br>
            <hr>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <hr>
            <input type="submit" name="" value="Submit" />
            <p>not an admin<a href="login.html">Customer Login</a></p>
        </fieldset>
    </form>
</body>
</html>
