<?php
    session_start();
    if($_SESSION['loggedin'] == false) header("Location: ../index.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../dist/site.css" rel="stylesheet" type="text/css">
        <title>Address Book</title>
    </head>
    <body>
        <div class="page__wrapper">
            <!-- MAIN SECTION: INTRO | DESCRIPTION -->
            <div class="main">
                <h3 class="main__title" id="title">Address Book</h3>
                <p class="main__subtitle" id="subtitle">Administration: Add Contact</p><br>
            </div>

            <!-- DATA SECTION: FORM | CONTACTS -->
            <div class="data">
                <form class="data__login" action="../controllers/Database.php">
                    <h2 class="data__login--title">ADD CONTACT</h2>
                    <input type="text" class="data__login--item" placeholder="first name" name="first_name" required><br>
                    <input type="test" class="data__login--item" placeholder="surname" name="surname" required><br>
                    <input type="text" class="data__login--item" placeholder="phone number" name="phone_number" required><br>
                    <input type="text" class="data__login--item" placeholder="email address" name="email_address" required><br>
                    <input type="text" class="data__login--item" placeholder="postal code" name="postal_code" required><br>
                    <input type="date" class="data__login--item" name="birthday" required><br>
                    <input type="submit" class="data__login--button" name="submit" value="ADD CONTACT">
                    <a href="../views/authenticated_view.php" class="data__login--button">CANCEL</a>
                    <input type="hidden" name="add" value="add">
                </form>
            </div>
        </div>
    </body>
</html>