<html>
<head>
    <title>Email Display</title>
</head>
<body>
<?php 
   
    $email = $_REQUEST['email'];
 
    
    if($email==""){
        echo "null value";
   
    }else{
        echo "$email";
    }
?>
</body>
</html>


