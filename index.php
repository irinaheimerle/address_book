<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="./dist/site.css" rel="stylesheet" type="text/css">
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
                <form class="data__login">
                    <h2 class="data__login--title">LOGIN</h2>
                    <input type="text" class="data__login--item" placeholder="username" name="username"><br>
                    <input type="text" class="data__login--item" placeholder="password" name="password"><br>
                    <input type="button" class="data__login--button" value="LOGIN">
                </form>

                <div class="data__contacts">
                    <h2 class="data__contacts--title">CONTACTS</h2>
                    <p>No Contacts Available</p>
                    <p>Please login to add one</p>
                </div>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="./dist/css.js"></script>
    </body>
</html>