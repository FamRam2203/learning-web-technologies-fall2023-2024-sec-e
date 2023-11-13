<?php
// Retrieve and update item quantities from the form
$burgerQuantity = isset($_POST['burger-quantity']) ? max((int)$_POST['burger-quantity'], 0) : 0;
$pizzaQuantity = isset($_POST['pizza-quantity']) ? max((int)$_POST['pizza-quantity'], 0) : 0;
$friesQuantity = isset($_POST['fries-quantity']) ? max((int)$_POST['fries-quantity'], 0) : 0;
$spaghettiQuantity = isset($_POST['spaghetti-quantity']) ? max((int)$_POST['spaghetti-quantity'], 0) : 0;
$meatboxQuantity = isset($_POST['meatbox-quantity']) ? max((int)$_POST['meatbox-quantity'], 0) : 0;
$saladQuantity = isset($_POST['salad-quantity']) ? max((int)$_POST['salad-quantity'], 0) : 0;
$chickenQuantity = isset($_POST['chicken-quantity']) ? max((int)$_POST['chicken-quantity'], 0) : 0;
$corndogQuantity = isset($_POST['corndog-quantity']) ? max((int)$_POST['corndog-quantity'], 0) : 0;

// Calculate the prices for each item
$burgerPrice = $burgerQuantity * 8.99;
$pizzaPrice = $pizzaQuantity * 10.99;
$friesPrice = $friesQuantity * 3.99;
$spaghettiPrice = $spaghettiQuantity * 12.99;
$meatboxPrice = $meatboxQuantity * 7.99;
$saladPrice = $saladQuantity * 9.99;
$chickenPrice = $chickenQuantity * 6.99;
$corndogPrice = $corndogQuantity * 4.99;

// Calculate the total amount
$totalAmount = $burgerPrice + $pizzaPrice + $friesPrice + $spaghettiPrice + $meatboxPrice + $saladPrice + $chickenPrice + $corndogPrice;

if ($totalAmount > 20.00) {
    $discountPercentage = 0.20; // 20% discount
    $discountAmount = $totalAmount * $discountPercentage;

    $maxDiscount = 10.00;
    $discountAmount = min($discountAmount, $maxDiscount);

    $totalAmount -= $discountAmount;
} else {
    $discountAmount = 0; // No discount applied
}
?>



<html lang="en">
<head>
</head>
<body>
    <div class="checkout-container">
        <h1>Checkout</h1>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <form method="post" action="receipt.php">
<ul>
    <li>
        Burger x
        <input type="number" name="burger-quantity" class="quantity-input" value="<?php echo $burgerQuantity; ?>" min="0">
        <span>$<?php echo number_format($burgerPrice, 2); ?></span>
    </li>

    <li>
        Pizza x
        <input type="number" name="pizza-quantity" class="quantity-input" value="<?php echo $pizzaQuantity; ?>" min="0">
        <span>$<?php echo number_format($pizzaPrice, 2); ?></span>
    </li>

    <li>
        Fries x
        <input type="number" name="fries-quantity" class="quantity-input" value="<?php echo $friesQuantity; ?>" min="0">
        <span>$<?php echo number_format($friesPrice, 2); ?></span>
    </li>

    <li>
        Spaghetti x
        <input type="number" name="spaghetti-quantity" class="quantity-input" value="<?php echo $spaghettiQuantity; ?>" min="0">
        <span>$<?php echo number_format($spaghettiPrice, 2); ?></span>
    </li>

    <li>
        Meatbox x
        <input type="number" name="meatbox-quantity" class="quantity-input" value="<?php echo $meatboxQuantity; ?>" min="0">
        <span>$<?php echo number_format($meatboxPrice, 2); ?></span>
    </li>

    <li>
        Salad x
        <input type="number" name="salad-quantity" class="quantity-input" value="<?php echo $saladQuantity; ?>" min="0">
        <span>$<?php echo number_format($saladPrice, 2); ?></span>
    </li>

    <li>
        Chicken x
        <input type="number" name="chicken-quantity" class="quantity-input" value="<?php echo $chickenQuantity; ?>" min="0">
        <span>$<?php echo number_format($chickenPrice, 2); ?></span>
    </li>

    <li>
        Corndog x
        <input type="number" name="corndog-quantity" class="quantity-input" value="<?php echo $corndogQuantity; ?>" min="0">
        <span>$<?php echo number_format($corndogPrice, 2); ?></span>
    </li>
</ul>


                <div class="total-amount">
                    Total Amount: $<span id="total-amount"><?php echo number_format($totalAmount, 2); ?></span>
                </div>

                


                </div>
                </div>
<fieldset>
    <form method="post" action="receipt.php">
        <legend>Customer details</legend>
            <div class="input-field">
            <label for="address">Delivery Address</label>
            <input type="text" class="form-control" id="Full_Name" name="address" pattern="[A-Za-z0-9]+(\s[A-Za-z0-9]+)*" title="Please enter at least two words with letters, numbers, and spaces only" required />
            </div>

            <div class="form-group">
            <label for="number">Phone Number</label>
            <input type="text" class="form-control" id="number" name="number" pattern="01[0-9]{9}" title="Please enter a valid 11-digit phone number starting with '01'" required />
            </div>

            <div class="payment-options">
            <label>Payment Options:</label><br>
            <input type="radio" id="cash" name="payment" value="cash" required>
            <label for="cash">Cash</label>
            <input type="radio" id="card" name="payment" value="card" required>
            <label for="card">Card</label>
            </div>

            <div class="input-field">
            <label for="pin">PIN:</label>
            <input type="password" id="pin" name="pin" pattern="[0-9]{4,4}" title="Password must be exactly 4 digits and can only contain numbers">
            </div>

            <div class="input-field">
            <label for="expiry">Expiry Date:</label>
            <input type="date" id="expiry" name="expiry" style="width: 150px;" min="2024-01-01">
            </div>
    <button type="submit" class="checkout-button">Confirm Order</button>
    </form>
</fieldset>
           


</body>
</html>
