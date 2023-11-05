<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    
    if (!isset($_SESSION['cart'][$item])) {
        $_SESSION['cart'][$item] = 0;
    }
    
    $_SESSION['cart'][$item]++;
}

// Display the cart contents
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Include your CSS styles here -->
</head>
<body>
    <h1>Shopping Cart</h1>
    
    <ul>
        <?php foreach ($_SESSION['cart'] as $item => $quantity): ?>
            <li><?= $item ?> x <?= $quantity ?></li>
        <?php endforeach; ?>
    </ul>
    
    <a href="menu.php">Back to Menu</a>
</body>
</html>
