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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit questions</title>
    <link rel="stylesheet" href="questions.css">
</head>
<body>
    <h1>Question hub</h1>
    <form class="main" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="quest">
            <input class="put" type="text" name="title" placeholder="Enter a title">
            <textarea class="question-input" name="question" placeholder="Enter your question"></textarea>
            <input class="sub" type="submit" name="submitq" value="Submit question">
        </div>
    </form>
    <div class="enu">
        <button class="menu" name="profile" onclick="location.href='profile.php' ">Profile</button>
        <button class="menu" name="home" onclick="location.href='home.php' ">Home</button>
    </div>
    <script src="themes.js"></script>
</body>
</html>

<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
        $question = filter_input(INPUT_POST, "question", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = $_SESSION["username"];

        if(empty($title) || empty($question)){
            echo "<p class='pop'>The title or the question is missing, if you wish to not post anything navigate to the menu.</p>";

        }
        else{
        $sql = "INSERT INTO question_data (username, title, question)
                VALUES ('$username', '$title', '$question')";

            mysqli_query($conn, $sql);
            echo "<p class='pop'>Your question has been posted!</p>";


        }
        
    }

    mysqli_close($conn);
?>