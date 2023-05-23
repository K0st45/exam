<?php
    // Check if the 'theme' cookie is set
    if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
    } else {
    // If the cookie is not set, default to the light theme
    $theme = 'dark';
    }

    if ($theme === 'light') {
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
    <title>Document</title>
    <link rel="stylesheet" href="colors.css">
    <link rel="stylesheet" href="guestlogin.css">
</head>
<body>
    <h1>Hello Guestssaaaaasss</h1>
    <button onclick="location.href='planet.php'">hahahahah</button>
</body>
</html>