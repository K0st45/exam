<?php
    include("databasebrocode.php");

    $sql = "SELECT * FROM personal"; //WHERE username = 'Akis'"; (for selected user)
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row["id"] . "<br>";
            echo $row["username"] . "<br>";
            echo $row["password"] . "<br>";
        };
    }
    else{
        echo "no user found";
    }

    mysqli_close($conn);
?>