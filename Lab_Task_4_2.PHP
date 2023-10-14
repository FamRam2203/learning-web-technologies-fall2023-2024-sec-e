<!DOCTYPE html>
<html>
<head>
    <title>Password Change</title>
    <style>
        .error-text {
            color: red;
        }
        .success-text {
            color: green;
        }
        .alignment
        {
            text-align: right;
        }
    </style>
</head>
<body>
    <?php
    $currentPassword = $newPassword = $retypePassword = $error = $success = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
        $retypePassword = $_POST["retypePassword"];

        if ($newPassword === $currentPassword) {
            $error = "<p class='error-text'>New Password should not be the same as the Current Password.</p>";
        } elseif ($newPassword !== $retypePassword) {
            $error = "<p class='error-text'>New Password must match with the Retyped Password.</p>";
        } else {
            // Password change logic (not shown in this example)
            // If validation passes, update the password
            $success = "Password changed successfully!";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset style= "width: 25%;">
        <legend>CHANGE PASSWORD</legend>
        <div class="alignment">
        <label for="currentPassword">Current Password: </label>
        <input type="password" id="currentPassword" name="currentPassword" required><br><br>

        <label for="newPassword" class="success-text">New Password:  </label>
        <input type="password" id="newPassword" name="newPassword" required><br><br>

        <label for="retypePassword" class="error-text">Retype Password: </label>
        <input type="password" id="retypePassword" name="retypePassword" required><br><br>

        </div>
       
        <hr>

        <div id="errorDiv">
            <?php
            if (!empty($error)) {
                echo $error;
            }
            if (!empty($success)) {
                echo "<p class='success-text'>$success</p>";
            }
            ?>
        </div>

        <input type="submit" value="Submit">
        </fieldset>
    </form>
</body>
</html>
