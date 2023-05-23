<?php
    include("databasebrocode.php");

    $username = "Akes";
    $password = "akis456";
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO personal (username, password)
            VALUES('$username', '$hash')";

    try{
        mysqli_query($conn, $sql);
        echo "user is registered";
    }
    catch(mysqli_sql_exception){
        echo "user could not register (error)";
    }
    mysqli_close($conn); 
?>