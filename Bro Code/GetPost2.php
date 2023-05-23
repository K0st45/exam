<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <form action="GetPost2.php" method="get">
        <label>Quantity:</label><br>
        <input type="text" name="quantity">
        <input type="submit" value="total">
    </form>
</body>
</html>

<?php

    $food = "pizza";
    $price = 8.99;
    $quantity = $_GET["quantity"];
    $total = null;

    $total = $quantity * $price;

    echo "You ordered {$quantity} {$food}/s <br>";
    echo "Your total is: {$total}";


?>