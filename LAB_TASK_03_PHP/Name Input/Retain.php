<html>

<head>

    <title>Name Input</title>

</head>

<body>

    <fieldset>

        <legend>Name</legend>

        <form method="post">

            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>

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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {

        $name = $_POST["name"];

        echo "<h1>Hello, $name!</h1>";

    }

    ?>

</body>

</html>

 