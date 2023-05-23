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
    <title>Edit profile</title>
    <link rel="stylesheet" href="editprof.css">
</head>
<body>
    <form  id="edit" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" autocomplete="off">
        <span class="open">Change firstname :</span>
        <input class="animated-input" type="text" name="firstname" placeholder="<?php echo $_SESSION["firstname"]; ?>"><br>
        <span class="open">Change lastname :</span>
        <input class="animated-input" type="text" name="lastname" placeholder="<?php echo $_SESSION["lastname"]; ?>"><br>
        <span class="open">Change username :</span>
        <input class="animated-input" type="text" name="username" placeholder="<?php echo $_SESSION["username"]; ?>"><br>
        <input class="btn" type="submit" name="change" value="Change user data">
    </form>
    <div class="mnu">
        <button class="une" onclick="location.href='profile.php'">Back</button>
    </div>
</body>
</html>
<?php
    //echo "{$_SESSION['lastname']},";
    //echo " {$_SESSION['firstname']} <br>";   
    //echo "Username: {$_SESSION['username']} <br>";   
    //echo "Your email is: {$_SESSION['email']} <br>";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

        if(!empty($firstname) && !empty($lastname) && !empty($username)){
            $sql = "UPDATE personal_data SET first_name='$firstname', last_name='$lastname', username='$username'
            WHERE email='{$_SESSION['email']}'";
            $sql2 = "UPDATE question_data set username='$username' WHERE username='{$_SESSION['username']}'";
        }

        elseif(!empty($firstname) && !empty($lastname) && empty($username)){
            $sql = "UPDATE personal_data SET first_name='$firstname', last_name='$lastname'
            WHERE email='{$_SESSION['email']}'";
        }

        elseif(!empty($firstname) && !empty($username) && empty($lastname)){
            $sql = "UPDATE personal_data SET first_name='$firstname', username='$username'
            WHERE email='{$_SESSION['email']}'";
            $sql2 = "UPDATE question_data set username='$username' WHERE username='{$_SESSION['username']}'";
        }

        elseif(!empty($lastname) && !empty($username) && empty($firstname)){
            $sql = "UPDATE personal_data SET last_name='$lastname', username='$username'
            WHERE email='{$_SESSION['email']}'";
            $sql2 = "UPDATE question_data set username='$username' WHERE username='{$_SESSION['username']}'";
        }

        elseif(!empty($firstname) && empty($lastname) && empty($username)){
            $sql = "UPDATE personal_data SET first_name='$firstname'
            WHERE email='{$_SESSION['email']}'"; 
        }
        elseif(!empty($lastname) && empty($firstname) && empty($username)){
            $sql = "UPDATE personal_data SET last_name='$lastname'
            WHERE email='{$_SESSION['email']}'";
        }
        elseif(!empty($username) && empty($lastname) && empty($firstname)){
            $sql = "UPDATE personal_data SET username='$username'
            WHERE email='{$_SESSION['email']}'";
            $sql2 = "UPDATE question_data set username='$username' WHERE username='{$_SESSION['username']}'";
        }
        elseif(empty($username) && empty($lastname) && empty($firstname)){
            header("location: profile.php");
        }
        
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } 
        else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        if(!empty($sql2)){

            if (mysqli_query($conn, $sql2)) {
                echo "Record updated successfully";
            } 
            else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        
        $sql = "SELECT * FROM personal_data WHERE email = '{$_SESSION['email']}'";
        $result = mysqli_query($conn, $sql);

        if(isset($_POST["change"])){
            $row = mysqli_fetch_assoc($result);
            $_SESSION["firstname"] = $row["first_name"];
            $_SESSION["lastname"] = $row["last_name"];
            $_SESSION["username"] = $row["username"];
            header("location: profile.php");
        }
    }

mysqli_close($conn);

?>