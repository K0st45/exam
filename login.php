<?php
    include("database.php");
?>
<?php
    // Check if the 'theme' cookie is set
    if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
    } else {
    // If the cookie is not set, default to the light theme
    $theme = 'light';
    }

    if ($theme === 'dark') {
    // If the 'theme' cookie is set to 'dark', use the dark theme
    echo "<body class='dark-theme'>";
    } else {
    // Otherwise, use the light theme
    echo "<body class='light-theme'>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="loginor.css">
</head>
<body>
    <div id="zen" class="zen">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <h2>Log In</h2>
            <div class="zat">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="zat">
                <input type="password" name="password" placeholder="Password">
            </div>
            <button class="btn">Log In</button>
            <button class="btn" name="guest">Log in as guest</button>
            <div class="gio">
                <p>Dont have an account? <a href="singup.php">Sing up</a></p>
            </div>
        </form>
    </div>
    <div class="contback">
        <button id="idtn" class="btn" onclick="location.href='planet.php'">Back</button>
    </div>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($_POST["guest"])){
            session_start();
            $_SESSION["guest"] = "guest";
            header("Location: home.php");
        }

        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

        //try{
        $sql = "SELECT * FROM personal_data WHERE email = '$email' ";
        $result = mysqli_query($conn, $sql);
        //}
        //catch(mysqli_sql_exception){
        //    echo "<div class='pero'>Email doesnt match, try again.</div>";
        //}

        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $hashed = $row["password"];

            if(password_verify($password, $hashed)){
                session_start();  
                $_SESSION["firstname"] = $row["first_name"];
                $_SESSION["lastname"] = $row["last_name"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["guest"] = "";
                
                header("location: home.php");        
            }
            else{
                echo "<div class='pero'>Password is incorrect, try again.</div>";
            }
        }
        else{
            echo "<div class='pero'>Email is incorrect, try again.</div>";
        }
    
    
    }

    mysqli_close($conn);
?>