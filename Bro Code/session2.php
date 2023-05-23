<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    this is some text <br>
    <form action="session2.php" method="post">
        <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>


<?php
    echo $_SESSION["username"] ."<br>";
    echo $_SESSION["password"] ."<br>";

    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: session.php");
    }
?>