<?php
    // hashing = trasforming sensitive data (password)
    //           into letters, numbers and/or symbols
    //           via a mathimatical process. (similar to encryption)
    //           Hides the original data from 3rd parties.

    $password = "kostas123";

    $hash = password_hash($password, PASSWORD_DEFAULT);

    if(password_verify("kostas123", $hash)){
        echo "You are logged in";
    }
    else{
        echo "icorrect password";
    }


?>