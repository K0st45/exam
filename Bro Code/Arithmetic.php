<?php
    // Arithmetic operators
    // + - * / ** %

    // Increment/decrement operators
    // ++ --

    // Operator precedence
    // ()
    // **
    // * / %
    // + -

    $x = 10;
    $y = 3;
    $z = null;

    // basic Arithmetic
    $z = $x + $y;
    //$z = $x - $y;
    //$z = $x * $y;
    //$z = $x / $y;
    //$z = $x ** $y;
    //$z = $x % $y;
    echo "{$z} <br>"; //ok

    //Increment/decrement
    //for decroment -- and for incrament ++ by 1 or += and -= for greater number
    $counter = 0;

    $counter+=2;
    echo "{$counter} <br>";

    //Operator precedence
    
    $total = 1 + 8 / 5 - 7 ** 4 * 9; //random sequence
    echo $total;
    

?>