<?php
$uploadError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["profile_picture"]["error"] == UPLOAD_ERR_OK) {
        $allowedFormats = ["image/jpeg", "image/jpg", "image/png"];
        $allowedSize = 4 * 1024 * 1024; // 4MB in bytes

        $fileType = $_FILES["profile_picture"]["type"];
        $fileSize = $_FILES["profile_picture"]["size"];

        if (in_array($fileType, $allowedFormats)) {
            if ($fileSize <= $allowedSize) {
                // The file is valid; you can process it or save it to a location here.
            } else {
                $uploadError = "Error: File size exceeds 4MB.";
            }
        } else {
            $uploadError = "Error: Invalid file format. Only JPEG and PNG files are allowed.";
        }
    } else {
        $uploadError = "Error: Please submit a file before pressing the submit button.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <fieldset name="profile_picture">
            <legend>Profile Picture</legend>
            <img src="profile_picture_logo.png" alt="Profile Picture Logo">
            <br>
            <input type="file" name="profile_picture" accept=".jpg, .jpeg, .png">
           
            <hr>
        </fieldset>
        <br>
        <input type="submit" name="submit" value="Submit">
        <?php if (!empty($uploadError)) { echo "<p style='color: red;'>$uploadError</p>"; } ?>
    </form>
</body>
</html>
