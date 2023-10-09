<html>

<head>

    <title>DATE OF BIRTH Input</title>

</head>

<body>

    <fieldset>

        <legend>DATE OF BIRTH</legend>

        <form action="" method="post">

            <table>

                <tr>

                    <td align="center">dd</td>

                    <td align="center">mm</td>

                    <td align="center">yyyy</td>

                </tr>

                <tr>

                    <td>

                        <input type="number" name="dd" value="" required> /

                    </td>

                    <td>

                        <input type="number" name="mm" value="" required> /

                    </td>

                    <td>

                        <input type="number" name="year" value="" required>

                    </td>

                </tr>

            </table>

            <hr>

            <input type="submit" name="" value="Submit">

        </form>

    </fieldset>

    <?php

        $mm = $_REQUEST['mm'];

        $dd = $_REQUEST['dd'];

        $year = $_REQUEST['year'];

 

        if($mm=="" || $dd=="" || $year=="")

        {

            echo "";

        }

        else

        {

            echo "<br> Day : $dd <br>";

            echo "Month : $mm <br>";

            echo "Year : $year";

        }

    ?>

</body>

</html>