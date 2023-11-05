<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 300px;
            padding: 20px;
            text-align: center;
        }

        h2 {
            font-size: 20px;
        }

        input[type="hidden"] {
            display: none;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
    
</head>
<body>
    <h1>Menu</h1>
    
    <!-- Burger -->
    <form method="post" action="cart.php">
        <h2>Burger</h2>
        <!-- Add your item details, image, and quantity input here -->
        <input type="hidden" name="item" value="Burger">
        <input type="submit" value="Add to Cart">
    </form>
    
    <!-- Pizza -->
    <form method="post" action="cart.php">
        <h2>Pizza</h2>
        <!-- Add your item details, image, and quantity input here -->
        <input type="hidden" name="item" value="Pizza">
        <input type="submit" value="Add to Cart">
    </form>
    
    <form method="post" action="cart.php">
        <h2>Fries</h2>
        <!-- Add your item details, image, and quantity input here -->
        <input type="hidden" name="item" value="Fries">
        <input type="submit" value="Add to Cart">
    </form>

    <form method="post" action="cart.php">
        <h2>Spaghetti</h2>
        <!-- Add your item details, image, and quantity input here -->
        <input type="hidden" name="item" value="Spaghetti">
        <input type="submit" value="Add to Cart">
    </form>
    <!-- Add more menu items similarly -->
</body>
</html>
