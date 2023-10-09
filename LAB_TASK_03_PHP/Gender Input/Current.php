<html>
<head>
    <title>HTML FORM</title>
</head>
<body>
    <form method="" action="" enctype="">
        <fieldset style="width: 20%">
            <legend>Gender</legend>
       
       
            <input type="radio" name="gender" value="" /> Male
            <input type="radio" name="gender" value="" /> Female
            <input type="radio" name="gender" value="" /> Other <br>
            <hr>
            <input type="submit" name="" value="Submit" />
       
      
     
        
        
    </fieldset>
    <?php 
   
   $Gender = $_REQUEST['Gender'];

   
   if($Gender==""){
       echo "";
  
   }else{
       echo "<br><h1>Name: $Gender</h1>";
   }
?>
    </form>
</body>
</html>