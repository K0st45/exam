<?php
    echo"back again <br>";
    echo"cat being gay <hr>";
    // this is a comment
    /*  this
        is 
        a
        multiline
        comment
    */
    /* variable = reusable container that holds data
        string, integer, float, boolean
    */

    // strings starts
    $name = "Kostas BR ";
    $food = "Pizza";
    $email = "Fake123@gmail.com";

    // integers starts
    $age = 20;
    $users = 5;
    $quantity = 7;

    // floats starts
    $gpa = 3.9;
    $price = 7.99;
    $tax_rate = 5.1;

    // boolians start, (for true 1, for false 0 and 0 is not seen)
    $employed = true;
    $online = false;
    $for_sale = true;

    //new stuff??
    $total = null;

    echo $name;
    echo "Hello {$name} !!! <br>";
    echo "i like {$food} <br>";
    echo "This is your email {$email} <br>";
    
    echo "Im am {$age} years old <br>";
    echo "there are {$users} people online <br>";
    echo "We have {$quantity} dildos in stock <br>";

    echo "If i was a good students i would have a gpa of {$gpa} <br>";
    echo "A pizza costs \${$price} <br>";
    //we use \ for the dollar sing to show, php gets confused
    echo "The sales tax rate is: {$tax_rate}% <br>";

    echo "online status: {$online} <br>";

    echo "You have ordered {$quantity} x {$food}s <br>";
    $total = $quantity * $price;
    echo "This is your total: \${$total} <hr>";

?>