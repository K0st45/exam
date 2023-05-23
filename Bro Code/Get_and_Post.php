<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>As if</title>
</head>
<body>
    <form action="Get_and_Post.php" method="post"> <!--get shows info to the url-->
        <label for="">Username:</label><br>
        <input type="text" name="username"><br>
        <label for="">Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="log in"><br>
    </form>
</body>
</html>

<?php
    // $_GET , $_POST = special variables used to collect data from an HTML form
    //                  data is sent to the file in the action attribute of <form>
    //                  <form action="some_file.php" method="get">

    //$_GET  =  Data is appended to the url
    //          NOT SECURE
    //          char limit
    //          Bookmaerk is possible w/ values
    //          GET requests can be cached
    //          Better for a search page

    //$_POST =  Data is package inside the body of the HTTP request
    //          MORE SECURE
    //          No data limit
    //          Cannot bokkmark
    //          GET requests are not cached
    //          Better for submitting credentials

    echo "{$_POST["username"]} <br>"; //one method for <br>
    echo $_POST["password"] . "<br>"; //one more method for <br>

?>