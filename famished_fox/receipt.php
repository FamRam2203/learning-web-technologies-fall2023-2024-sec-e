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

<html>
<head>
    <title>Receipt</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">
<div style="margin-bottom: 20px;">
        <h1>Receipt</h1>

        <div style="margin-bottom: 20px;">
            <h1>Your order has been received! Thanks for choosing Famished Fox! </h1>
            <h2 style="margin-bottom: 10px;">Order Summary</h2>
            <ul style="list-style-type: none; padding: 0;">
                <?php if ($burgerQuantity > 0): ?>
                    <li style="margin: 10px 0;">Burger x
                        <span style="font-size: 18px;"><?php echo $burgerQuantity; ?></span>
                    </li>
                <?php endif; ?>

                <?php if ($pizzaQuantity > 0): ?>
                    <li style="margin: 10px 0;">Pizza x
                        <span style="font-size: 18px;"><?php echo $pizzaQuantity; ?></span>
                    </li>
                <?php endif; ?>

                <?php if ($friesQuantity > 0): ?>
                    <li style="margin: 10px 0;">Fries x
                        <span style="font-size: 18px;"><?php echo $friesQuantity; ?></span>
                    </li>
                <?php endif; ?>

                <?php if ($spaghettiQuantity > 0): ?>
                    <li style="margin: 10px 0;">Spaghetti x
                        <span style="font-size: 18px;"><?php echo $spaghettiQuantity; ?></span>
                    </li>
                <?php endif; ?>

                <?php if ($meatboxQuantity > 0): ?>
                    <li style="margin: 10px 0;">Meatbox x
                        <span style="font-size: 18px;"><?php echo $meatboxQuantity; ?></span>
                    </li>
                <?php endif; ?>

                <?php if ($saladQuantity > 0): ?>
                    <li style="margin: 10px 0;">Salad x
                        <span style="font-size: 18px;"><?php echo $saladQuantity; ?></span>
                    </li>
                <?php endif; ?>

                <?php if ($chickenQuantity > 0): ?>
                    <li style="margin: 10px 0;">Chicken x
                        <span style="font-size: 18px;"><?php echo $chickenQuantity; ?></span>           
                    </li>
                <?php endif; ?>

                <?php if ($corndogQuantity > 0): ?>
                    <li style="margin: 10px 0;">Corndog x
                        <span style="font-size: 18px;"><?php echo $corndogQuantity; ?></span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div style="font-size: 18px; margin-top: 20px;">
            <?php if ($discountAmount > 0): ?>
                <p>Original Amount: $<?php echo number_format($totalAmount + $discountAmount, 2); ?></p>
                <p>Discount: -$<?php echo number_format($discountAmount, 2); ?></p>
            <?php endif; ?>
            Final Total Amount: $<?php echo number_format($totalAmount, 2); ?>
        </div>

        <p style="font-size: 18px;">Delivery Address: <?php echo $_POST['address']; ?></p>
        <p style="font-size: 18px;">Mobile Number: <?php echo $_POST['number']; ?></p>
        <p style="font-size: 18px;">Payment Method: <?php echo $_POST['payment']; ?></p>
        <a href="checkout.php" style="font-size: 18px; display: block; margin-top: 20px;">Go Back and fill up a fresh order</a>

    </div>
</body>
</html>
