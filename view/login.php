<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $UserName = isset($_POST['UserName']) ? $_POST['UserName'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($UserName == "" || $password == "") {
        echo "<h2>Please enter both username and password.</h2>";
        echo '<a href="Login.html"><button>Login Retry</button></a>';
    } else {
        $con = new mysqli("localhost", "root", "", "test");

        if ($con->connect_error) {
            die("Failed to connect: " . $con->connect_error);
        } else {
            $stmt = $con->prepare("select * from registration where UserName = ?");
            $stmt->bind_param("s", $UserName);
            $stmt->execute();
            $stmt_result = $stmt->get_result();//fetch result

            $loginSuccess = false; // Set a flag to indicate failed login by default

            if ($stmt_result->num_rows > 0) { //if there are rows, it means that the provided username exists in the database.
                $data = $stmt_result->fetch_assoc(); //Fetches the associative array representation of the first row in the result set. 
                if ($data['password'] === $password) {
                    $loginSuccess = true; // Set the flag to indicate successful login
                    $_SESSION['UserName'] = $UserName; // Set the session variable
                    echo "<h2>Welcome $UserName! You have successfully logged in!</h2>";
                } else {
                    echo "<h2>Incorrect password. Please try again.</h2>";
                    echo '<a href="Login.html"><button>Login Retry</button></a>';
                }
            } else {
                echo "<h2>Username not found. Please check your username.</h2>";
                echo '<a href="Login.html"><button>Login Retry</button></a>';
            }
        }
    }
} elseif (isset($_GET['username'])) {
    // Check if the username is present in the URL parameters
    $UserName = $_GET['username'];
    $_SESSION['UserName'] = $UserName;
    $loginSuccess = true;
}

?>

<html>
<head>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">
<ul class="navbar" style="list-style-type: none; margin: 0; padding: 0; background-color: black; overflow: hidden;">
        <li>
              <img src="logo.jpg" alt="Famished Logo" style="height: 100px;">
        </li>
       
        <?php
        if ($loginSuccess) {
            echo '<li style="float: right;"><a class="login-button" href="Login.html" style="background-color: #555; border: none; color: white; text-align: center; text-decoration: none; display: inline-block; padding: 14px 16px; margin: 8px 4px; cursor: pointer;">Logout</a></li>';
           /* echo '<li class="right">
                <a href="profile.php?username=' . $UserName . '">
                    <img src="user-icon.jpg" alt="User Icon" style="height: 30px; width: 30px; margin-right: 5px;">
                    <span style="font-size: 30px;">' . $UserName . '</span>
                </a>
            </li>';*/
            
        }
        ?>
    </ul>

    <div style="color:black; padding:20px; background-color: grey; background-image: url('cover_image.jpg'); background-size: cover; background-repeat: no-repeat; width: 100%; height: 200px;">
    <h1 style="font-size: 24px;">Welcome to Famished Fox</h1>
        <p>This is an independent food delivery site please help yourself!</p>
    </div>

    <div class="food-container" style="display: flex; flex-direction: column; padding: 20px;">

        <div class="food-row1" style="display: flex; justify-content: space-between;">
            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Burger.html"><img src="burger.jpg" alt="Burger" style="max-width: 100%; height: 200px;"></a>
                <h3 style="font-size: 20px; margin: 10px 0;">Burger</h3>
                <p style="font-size: 16px;">Delicious beef burger with lettuce, cheese, and special sauce.</p>
                <p>$8.99</p>
            </div>

            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Pizza.html"><img src="pizza.jpg" alt="Pizza" style="max-width: 100%; height: 200px;"></a>
                <h3>Pizza</h3>
                <p>Freshly baked pizza with your choice of toppings.</p>
                <p>$10.99</p>
            </div>
    
            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Spaghetti.html"><img src="Spaghetti.jpg" alt="Spaghetti" style="max-width: 100%; height: 200px;"></a>
                <h3>Spaghetti</h3>
                <p>Fresh Spaghetti with minced beef.</p>
                <p>$12.99</p>
            </div>
    
            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Fries.html"><img src="fries.jpg" alt="French Fries" style="max-width: 100%; height: 200px;"></a>
                <h3>French fries</h3>
                <p>Freshly cooked fries in an air fryer to reduce calorie intake</p>
                <p>$2.99</p>
            </div>
        </div>

        <div class="food-row2" style="display: flex; justify-content: space-between;">
            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Meatbox.html"><img src="meatbox.jpg" alt="Meatbox" style="max-width: 100%; height: 200px;"></a>
                <h3>Meatbox</h3>
                <p>Meatbox bombarded with chicken,sausage,fries,coleslaw and house special sauce.</p>
                <p>$7.99</p>
            </div>
    
            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Greeksalad.html"><img src="greeksalad.jpg" alt="Greeksalad" style="max-width: 100%; height: 200px;"></a>
                <h3>Greeksalad</h3>
                <p>Greek salad made with pure olive oil, a perfect meal for health conscious patrons.</p>
                <p>$9.99</p>
            </div>
    
            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Chicken.html"><img src="chicken.jpg" alt="Chicken" style="max-width: 100%; height: 200px;"></a>
                <h3>Korean bbq chicken</h3>
                <p>Fried chicken dipped in korean bbq sauce.</p>
                <p>$6.99</p>
            </div>
    
            <div class="food-box" style="width: 250px; border: 1px solid #ddd; margin: 10px; padding: 10px; background-color: #fff; text-align: center;">
                <a href="Corndog.html"><img src="corndog.jpg" alt="Corndog" style="max-width: 100%; height: 200px;"></a>
                <h3>Corndog</h3>
                <p>Deep fried corndog, super scrumptious.</p>
                <p>$4.99</p>
            </div>
        </div>

    </div>

</body>

</html>
