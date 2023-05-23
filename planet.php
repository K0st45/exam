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
    <title>Main</title>
    <link rel="stylesheet" href="sun.css">
    <link rel="stylesheet" href="colors.css">
    <script src="side.js"></script>
</head>
<body>
    <h1>Welcome to CosmoConnect</h1>
    <div id="ase" class="nod">
        <button class="rol" onclick="location.href='login.php'">Log In</button>
        <button class="rol" onclick="location.href='singup.php'">Sing Up</button>
    </div>
    <div id="sry" class="menubtn">
        <button class="macrin" onclick="toggleNav()">Support</button>
        <!--<button class="macrin" onclick="location.href='smlhelp.php'">Small help</button>-->
        <button class="macrin" onclick="toggleTheme()">Theme</button>           <!--Thats the button to change the theme (haha)-->
    </div>
    <div class="sided" id="mySidenav">
        <div class="bored">
            <span class="sed">
            To register on our website, simply click the "Sign Up" button located in the upper right 
            corner and complete the required fields to finalize your registration. If you already have an 
            account, you can access it by clicking the "Log In" button adjacent to the "Sign Up" button.
            <br>
            As a guest visitor to our webpage, you will have the privilege of viewing questions 
            posted by other users, albeit without the ability to provide answers or submit your 
            own queries, as these functionalities are reserved for registered members.
            <br>
            By clicking the "Theme" button, you can effortlessly switch between a pristine 
            white background and a sophisticated dark mode, catering to your visual preferences 
            and enhancing your browsing experience.
            </span>
        </div>
    </div>
    <div class="help">
        <h2>Introduction</h2>
        <span class="sed">
            Η ιστιοσελίδα μας έχει σκοπό τη βοήθεια των χρηστών και την επαφή τους με άλλους 
            ανθρώπους, οι οποίοι μπορούν να δώσουν και να πάρουν γνώσεις μέσω της σελίδας μας. 
            Η δημιουργία μιας κοινότητας θα βοηθήσει πολλούς χρήστες να βγουν από 
            προγραμματιστικά αδιέξοδα, καθώς και να διευκολυνθούν ώστε να μπορέσουν να 
            φτιάξουν προγράμματα στον σωστό χρόνο.
            <br>
            Κάνοντας την εγγραφή σας, θα μπορείτε να είστε μέλος της παρέας μας, να επικοινωνείτε 
            με άλλους χρήστες και να έχετε τη δυνατότητα να κάνετε και εσείς μια ανάρτηση στην 
            ιστοσελίδα μας.
            <br>
            More info can be found by clicking the support button, top left corner.
        </span>
	</div>
    <script src="themes.js"></script>
</body>
</html>