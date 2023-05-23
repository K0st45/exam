<?php
    session_start();
    include("database.php");

    // Retrieve the question ID from the URL parameter
    $title = $_GET['title'];
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
    <title>Question and Answers</title>

    <link rel="stylesheet" href="answer.css">
</head>
<body>
    <h1>Answer hub</h1>
    <form class="main" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="answ">
            <textarea class="answer-input" name="answer" placeholder="Do you have an answer?"></textarea>
            <input class="sub" type="submit" name="submitq" value="Submit answer">
        </div>
    </form>
    <div class="menu">
            <button class="btn1" onclick="location.href='home.php'">Home</button>
    </div>
    <div class="qnaarea">
        <div class="qna">
            <?php

                $sql = "SELECT * FROM question_data WHERE title = '$title' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                echo $row["username"] . " posted at " . $row["submit_time"] ." about: <br>";
                echo $row["title"]. "<br>";
                echo $row["question"]. "<br>";

                //$title = $row["title"];
                //$text = $row["question"];
                // Display the question details
                //echo "<h2> Title: " . $row['title'] . "</h2> <hr>";
                //echo "<p>" . $row['question'] . "</p>";

            ?>
        </div>
        <div class="pip">
            <p>The answers for this question apear here.</p>
        </div>
        <div class="ans">
            <?php
                $sql2 = "SELECT * FROM answer_data WHERE title = '$title' ";

                $result2 = mysqli_query($conn, $sql2);

                if(mysqli_num_rows($result2) > 0){
                    while($row = mysqli_fetch_assoc($result2)){
                        echo "<div class='answers'> {$row["answer"]} <br> </div>";
                    }

                }
            ?>
        </div>
    </div>

</body>

<?php
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_SESSION["guest"] == "guest"){
            echo "<p class='pop'>At the momment as a guest you cannot post an answer, we will change that in the future.</p>";
            
        }
        else{

            $answer = filter_input(INPUT_POST, "answer", FILTER_SANITIZE_SPECIAL_CHARS);
            $username = $_SESSION["username"];

            if(empty($answer)){
                echo "<p class='pop'>Write your answer first.</p>";

            }
            else{
            
                try{    
                    
                    $sql3 = "INSERT INTO answer_data (username, title, answer)
                            VALUES ('$username', '$title', '$answer')";

                    mysqli_query($conn, $sql3);
                    echo "<p class='pop'>Your answer has been posted!</p>";
                    
                }
                catch(mysqli_sql_exception){
                    echo "<p class='pop'>It seems someone had the same idea try something else as your answer.</p>";
                }
            }
        }
    }
        

    mysqli_close($conn);
?>