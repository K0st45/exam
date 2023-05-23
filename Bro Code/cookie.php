<?php
    // cookie = Information about a user stored in a user's web-browser
    //          targeted advertisements, browsing prefernces, and
    //          other non-sensitive data

    setcookie("fav_food", "pizza", time() -0, "/"); //  -0 to delete the cookie
    setcookie("fav_drink", "cola", time() + (86400 * 3), "/");
    setcookie("fav_toy", "lego", time() + (86400 * 4), "/");
    /*
    foreach($_COOKIE as $key => $value){
        echo "{$key} = {$value} <br>";
    }
    */
    if(isset($_COOKIE["fav_food"])){
        echo "BUY SOME {$_COOKIE["fav_food"]} NOWWWW <br>";
    }
    else{
        echo "i dont know your fav food <br>";
    }
?> 