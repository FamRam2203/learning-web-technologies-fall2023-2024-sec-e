<html>

<head>

    <title>DOB Display</title>

</head>

<body>

    <?php

        $mm = $_REQUEST['mm'];

        $dd = $_REQUEST['dd'];

        $yyyy = $_REQUEST['yyyy'];

 

        if($mm=="" || $dd=="" || $yyyy=="")

        {

            echo "null value";

        }

        else

        {

            echo "Day : $dd <br>";

            echo "Month : $mm <br>";

            echo "Year : $yyyy";

        }

    ?>

</body>

</html>