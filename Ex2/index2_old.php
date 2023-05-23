<?php
    setcookie("color", "", time() + 6400);
    $myColor = $_COOKIE["color"];
    
    if(isset($_POST["change"])){
        if($myColor == "white"){
            setcookie("color", "black", time() + 6400);
        }
        else{
            setcookie("color", "white", time() + 6400);
        }
    }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script>
        let getting = document.cookie.split("; ").find((row) => row.startsWith("color="))
            ?.split("=")[1];
            alert(getting);
        function changeColor(){
            document.body.style.backgroundColor = getting;
        }
    </script>
</head>
<body onload="changeColor()">
    <h1>kostas</h1>
    <form action="index2.php" method="post">
        <button name="change">color modes</button>
    </form>
    <a href="index.php">go to index</a>
</body>
</html>