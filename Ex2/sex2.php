<?php 
$startingColor = $_COOKIE["color"] ?? "empty";
if($startingColor == "empty"){
    setcookie("color", "black", time() + 6400);
}


if(isset($_POST["go_to"])){
    header("Location: sex.php");
}
else if(isset($_POST["SwapColor"])){
    $color = $_COOKIE["color"];

    if($color == "black"){
        setcookie("color", "white", time() + 6400);
    }
    else{
        setcookie("color", "black", time() + 6400);
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
        let color = document.cookie
            .split("; ").find((row) => row.startsWith("color="))
            ?.split("=")[1] ?? "empty";

        function setBackground(){

            if(color == "black"){
                document.body.style.backgroundColor = "rgb(20, 20, 20)";
            }
            else{
                document.body.style.backgroundColor = "lightgrey";
            }
        }
    </script>
</head>
<body onload="setBackground()">
    <form action="sex2.php" method="post">
        <button name="SwapColor">sex update</button>
        <button name="go_to">blaska</button>
    </form>
</body>
</html>