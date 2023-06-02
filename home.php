<?php
    session_start();
    include("database.php");
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
<?php

if(isset($_POST["logout"])){
    session_destroy();
    header("Location: planet.php");
    exit;
}
if(isset($_POST["profile"])){
    if($_SESSION["guest"] == "guest"){
        echo "<script>alert('You are logged in as guest!');</script>";
    }
    else{
        header("Location: profile.php");
        exit;
    }
}
if(isset($_POST["questions"])){
    if($_SESSION["guest"] == "guest"){
        echo "<script>alert('You are logged in as guest!');</script>";
    }
    else{
        header("Location: questions.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
</head>
<body>
    <h1>CosmoConnect</h1>
    <div class="user">
        <span>Welcome back <?php if(empty($_SESSION["guest"])){ 
            echo $_SESSION["username"]. ', your questions are listed here.<br> Answers will be shown after you press the title.'; 
            } else{ echo ''; } ?>
        </span>
    </div>
    <form class="forne" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="search-bar">
            <input type="text" class="search-input" name="search-input" placeholder="Search a user, a title or a question">
            <button class="search-button" name="submit">
                <span class="material-symbols-outlined">search</span>
            </button>
        </div>
        <button class="menu" name="questions">Question hub</button>
        <button class="menu" name="profile">Profile</button>
        <button class="menu" name="logout">Logout</button>
    </form> 
    <button id="theme" class="menu" name="theme" onclick="toggleTheme()">Change Cosmo</button>
    
    <div class="quest">
        <?php
            if($_SESSION["guest"] == "guest"){
                echo "As a guest you cannot post questions,<br>but you can still see the posts of other users.";
            }
            elseif(empty($_SESSION["guest"])){
                
            $username = $_SESSION["username"];           

            $query = "SELECT title, submit_time FROM question_data WHERE username = '$username'";

            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)){
                
                $title = $row['title'];
                $time = $row['submit_time'];
                $linkText = "<a href='answear.php?title=" . $row["title"] . "' class='title'>$title<br><span>$time</span></a>";

                echo $linkText;
                }

            }
        ?>
    </div>
    <div class="searched">
            <?php 
                if(isset($_POST["search-input"])){
                    $searchinput = filter_input(INPUT_POST, "search-input", FILTER_SANITIZE_SPECIAL_CHARS);
                    

                    $sql = "SELECT * FROM question_data WHERE username LIKE '%$searchinput%' OR title LIKE '%$searchinput%' OR question LIKE '%$searchinput%'";
                    
                    $result = mysqli_query($conn, $sql);


                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div class='ress'><a href='answear.php?title={$row["title"]}'> <p class='result'>User: {$row['username']} <br> About: {$row['title']}</p> <br>
                                  <p class='result2'>Question: {$row['question']}</p> <p class='result'>{$row['submit_time']}</p> </a></div>";
                            
                        }

                    }
                    
                }
                
            ?>
    </div>
    <div class="some">The questions are going to be show here.</div>

    <script src="themes.js"></script>
</body>
</html>

<?php
    mysqli_close($conn);
?>