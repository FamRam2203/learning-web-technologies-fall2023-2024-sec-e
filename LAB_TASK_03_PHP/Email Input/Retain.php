<html>

<head>

    <title>Email Input</title>

</head>

<body>

    <fieldset>

        <legend>Email</legend>

        <form method="post">

            <input type="email" id="name" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>

            <input type="submit" value="Submit">

        </form>

    </fieldset>

    

    <?php

    // $name = $_REQUEST['name'] && isset($_REQUEST['name']);

 

    // if($name=="")

    // {

    //     echo "";

    // }

    // else

    // {

    //     echo "<br> <h1>Name : $name</h1>";

    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {

        $email = $_POST["email"];

        echo "<h1>Hello, $email!</h1>";

    }

    ?>

</body>

</html>

 