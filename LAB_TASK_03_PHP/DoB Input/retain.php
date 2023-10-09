
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

                        <input type="number" name="dd" value="<?php echo isset($_POST['dd']) ? htmlspecialchars($_POST['dd']) : ''; ?>" required> /

                    </td>

                    <td>

                        <input type="number" name="mm" value="<?php echo isset($_POST['mm']) ? htmlspecialchars($_POST['mm']) : ''; ?>" required> /

                    </td>

                    <td>

                        <input type="number" name="yy" value="<?php echo isset($_POST['yy']) ? htmlspecialchars($_POST['yy']) : ''; ?>" required>

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

        $yy = $_REQUEST['yy'];

 

        if($mm=="" || $dd=="" || $yy=="")

        {

            echo "";

        }

        else

        {

            echo "<br> Day : $dd <br>";

            echo "Month : $mm <br>";

            echo "Year : $yy";

        }

    ?>

</body>

</html>

 