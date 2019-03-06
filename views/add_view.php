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

            <!-- DATA SECTION: FORM | CONTACTS  -->
            <div class="data">
                <form class="data__login" action="../controllers/Database.php">
                    <h2 class="data__login--title">ADD CONTACT</h2>
                    <input type="text" class="data__login--item" placeholder="first name" name="first_name"><br>
                    <input type="test" class="data__login--item" placeholder="surname" name="surname"><br>
                    <input type="text" class="data__login--item" placeholder="phone number" name="phone_number"><br>
                    <input type="text" class="data__login--item" placeholder="postal code" name="postal_code"><br>
                    <input type="date" class="data__login--item" name="birthday"><br>
                    <input type="submit" class="data__login--button" name="submit" value="ADD CONTACT">
                </form>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="./dist/css.js"></script>
    </body>
</html>