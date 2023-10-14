<?php
$name = $email = $username = $password = $confirmPassword = $gender = $dob = $errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];

    // Validation for email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please write email in @ format.";
    }

    // Validation for password matching
    if ($password !== $confirmPassword) {
        $errorMsg = "Password doesn't match with Confirm Password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        .custom-fieldset {
            width: 40%;
        }

        .tooltip {
            position: relative;
        }

        .tooltip .info-icon {
            display: inline-block;
            margin-left: 5px;
            cursor: pointer;
        }

        .tooltip .tooltip-text {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            bottom: 125%;
            left: 0;
        }

        .tooltip:hover .tooltip-text {
            display: block;
        }
    </style>
</head>
<body>
    <form method="post">
        <fieldset name="registration" style="width: 50%;">
            <legend>Registration</legend>
            <div>
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                <hr>
            </div>
            <div class="tooltip">
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                <span class="info-icon">&#9432;</span>
                <div class="tooltip-text">Please write email in @ format.</div>
                <hr>
            </div>
            <div>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" value="<?php echo $username; ?>">
                <hr>
            </div>
            <div>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" value="<?php echo $password; ?>">
                <hr>
            </div>
            <div>
                <label for="confirm_password">Confirm Password: </label>
                <input type="password" name="confirm_password" id="confirm_password" value="<?php echo $confirmPassword; ?>">
                <hr>
            </div>
            <fieldset name="gender">
                <legend>Gender</legend>
                <input type="radio" name="gender" value="male" <?php echo ($gender === "male") ? "checked" : ""; ?>> Male
                <input type="radio" name="gender" value="female" <?php echo ($gender === "female") ? "checked" : ""; ?>> Female
                <input type="radio" name="gender" value="other" <?php echo ($gender === "other") ? "checked" : ""; ?>> Other
                <hr>
            </fieldset>
            <fieldset name="dob">
                <legend>Date of Birth</legend>
                
                <input type="text" name="dob_day" placeholder="dd" maxlength="2">
                <input type="text" name "dob_month" placeholder="mm" maxlength="2">
                <input type="text" name="dob_year" placeholder="yyyy" maxlength="4">
                (dd/mm/yyyy)
    
                <hr>
                
            
            </fieldset>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">
        </fieldset>
        <?php if (!empty($errorMsg)) { echo "<p style='color: red;'>$errorMsg</p>"; } ?>
    </form>
</body>
</html>