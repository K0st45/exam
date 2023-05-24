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
            Για να εγγραφείτε στην ιστοσελίδα, απλώς πατήστε το κουμπί "Sing Up" πάνω δεξιά και
            συμπληρώστε τα πεδία για να ολοκληρώσετε την εγγραφή σας. Αν έχετε ήδη λογαριασμό,
            δίπλα από το κουμπί "Sing Up" υπάρχει και το "Log In" ώστε να μπείτε στον λογαριασμό 
            σας. Συνδεόντας ως επισκέπτης στην σελίδα μας, μπορείτε να δείτε τις ερωτήσεις άλλων 
            χρηστών χωρίς να έχετε κάποιο δικό σας προφίλ, αλλά δεν μπορείτε να απαντήσετε σε 
            κάποιο ερώτημα ή να κάνετε κάποια δική σας ερώτηση. Κάνοντας κλικ στο κουμπί "Τheme," 
            μπορείτε να αλλάξετε το θέμα της σελίδας από λευκό σε σκούρο και αντίστροφα. Πατώντας 
            το κουμπί "About us," μπορείτε να δείτε περισσότερες πληροφορίες σχετικά με την σελίδα.
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
            Περισσότερες πληροφορίες μπορούν να βρεθούν κάνοντας κλικ στο κουμπί "support", 
            στην πάνω αριστερή γωνία.
        </span>
	</div>
    <script src="themes.js"></script>
</body>
</html>