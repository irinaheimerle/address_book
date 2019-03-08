<?php 
    session_start();
    if($_SESSION['loggedin'] == true) header("Location: ./views/authenticated_view.php");
    else echo "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="dist/site.css" rel="stylesheet" type="text/css">
        <title>Address Book</title>
    </head>
    <body>
        <div class="page__wrapper">
            <!-- MAIN SECTION: INTRO | DESCRIPTION -->
            <div class="main">
                <h3 class="main__title" id="title">Address Book</h3>
                <p class="main__subtitle" id="subtitle">PHP | MySQL | WebPack</p><br>
            </div>

            <!-- DATA SECTION: FORM | CONTACTS  -->
            <div class="data">
                <form class="data__login" action="../controllers/Database.php">
                    <h2 class="data__login--title">LOGIN</h2>
                    <input type="text" class="data__login--item" placeholder="username" name="username"><br>
                    <input type="password" class="data__login--item" placeholder="password" name="password"><br>
                    <input type="submit" class="data__login--button" value="LOGIN">
                    <input type="hidden" name="login" value="login">
                </form>
            </div>
        </div>
    </body>
</html>