<?php
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $showPassword = isset($_POST['showPassword']);

    if ($showPassword) {
        echo "Password: $password"; // Display the password if the checkbox is checked
    } else {
        echo "Password is hidden";
    }
}
?>
