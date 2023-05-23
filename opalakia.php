<?php

	$db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "stambaseDB";

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    if($conn){
        echo "hello";
    }
    else{
        echo "could not connect";
    }

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
    <title>Sign Up</title>
    <link rel="stylesheet" href="Singup.css">
</head>
<body>
    <div id="zeda">
        <form action="opalakia.php" method="post">
            <h2>Sing Up</h2>
            <div class="lapo">
                <input type="text" name="firstname" placeholder="First name" required>
            </div>
            <div class="lapo">
                <input type="text" name="lastname" placeholder="Last name" required>
            </div>
            <div class="lapo">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="lapo">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="lapo">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <button class="btn">Sing Up</button>
            <div class="logt">
                <p>Already have an account? <a href="Login.php">Log in</a></p>
            </div>
        </form>
    </div>
    <div class="contback">
        <button id="idtn" class="btn" onclick="location.href='https://assigment-container-ijnoj.run-us-west2.goorm.site/assigment_container/Mainpage.php'">Back</button>
    </div>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO userdata (first_name, last_name, username, password, email)
            VALUES ('$firstname', '$lastname', '$username', '$hash', '$email')";
	
	
	echo $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;

        header("location: https://assigment-container-ijnoj.run-us-west2.goorm.site/assigment_container/home.php");
        exit;
    } else {
        echo "There is an error, please try again";
    }
}
error_reporting(E_ALL);
ini_set('display_errors', 1);


$conn->close();
?>