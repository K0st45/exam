<?php
    session_start();
?>
<?php
    // Check if the 'theme' cookie is set
    if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
    } 
    else {
    // If the cookie is not set, default to the light theme
    $theme = 'light';
    }

    if ($theme === 'dark') {
    // If the 'theme' cookie is set to 'dark', use the dark theme
    echo "<body class='dark-theme'>";
    } 
    else {
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
    <title>profile page</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <form class="lel" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input class="lol" type="submit" name="edit" value="Edit profile">
        <input class="lol" type="submit" name="home" value="Home">
    </form>
    <div class="wrapper">
        <div class="left">
            <img src="profilepic01.jpg" alt="user" width="100">
            <h4><?php echo "{$_SESSION['lastname']}, {$_SESSION['firstname']}"; ?></h4>
            <p><?php echo "{$_SESSION['username']}"; ?></p>
        </div>
        <div class="right">
            <div class="info">
                <h3>Information</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p><?php echo "{$_SESSION['email']}"; ?></p>
                    </div>
                    <div class="data">
                    <h4>Phone</h4>
                        <p>0001-213-998761</p>
                    </div>
                </div>
            </div>
      
            <div class="projects">
                <h3>Projects</h3>
                <div class="projects_data">
                    <div class="data">
                        <h4>Recent</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="data">
                        <h4>Most Viewed</h4>
                        <p>dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php

    //echo "{$_SESSION['lastname']},";
    //echo " {$_SESSION['firstname']} <br>";   
    //echo "Username: {$_SESSION['username']} <br>";   
    //echo "Your email is: {$_SESSION['email']} <br>";   

    if(isset($_POST["edit"])){
        header("Location: editprof.php");
    }
    if(isset($_POST["home"])){
        header("Location: home.php");
    }
?>