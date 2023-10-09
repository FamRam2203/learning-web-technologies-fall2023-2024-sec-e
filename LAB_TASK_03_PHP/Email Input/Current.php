<!DOCTYPE html>
<html>
<head>
    <title>Email Input</title>
</head>
<body>
    
        <fieldset style="width: 40%">
           
            <legend>Email</legend>
            <form action="" method="post" >
                <input type="email" name="Email" value="" required>
            <br> 
            <hr>
            <input type="submit" id="" name="" value="Submit">
        </form>
        </fieldset>
        <?php 
   
        $Email = $_REQUEST['Email'];
     
        
        if($Email==""){
            echo "";
       
        }else{
            echo "<br><h1>Name: $Email</h1>";
        }
    ?>
</body>
</html>