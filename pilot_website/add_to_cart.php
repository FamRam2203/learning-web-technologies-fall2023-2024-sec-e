<?php
session_start();

// Get item name and quantity from the form
$itemName = $_POST['item-name'];
$itemQuantity = (int)$_POST["{$itemName}-quantity"];

// Initialize the cart array if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Update the item quantity in the cart
$_SESSION['cart'][$itemName] = $itemQuantity;

// Redirect back to the previous page (e.g., burger.html, pizza.html)
header("Location: {$_SERVER['HTTP_REFERER']}");
