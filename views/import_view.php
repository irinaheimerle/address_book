<?php 
    session_start();
    if($_SESSION['loggedin'] == false) header("Location: ../index.php");
    $current_contact = (int) substr($_SERVER['QUERY_STRING'], 3, strlen($_SERVER['QUERY_STRING'])); 
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
                <p class="main__subtitle" id="subtitle">Administration: IMPORT CSV</p><br>
            </div>

            <!-- DATA SECTION: FORM | CONTACTS  -->
            <div class="data">
                <form enctype="multipart/form-data" class="data__login" action="../controllers/Database.php"  method="POST">
                    <h2 class="data__login--title">IMPORT CSV</h2>
                    <input type="file" name="given_file" class="data__login--item">
                    <input type="submit" value="Import File" class="data__login--button">
                    <a href="../views/authenticated_view.php" class="data__login--button">CANCEL</a>
                    <input type="hidden" value="import_csv" name="import_csv">
                </form>
            </div>
        </div>
    </body>
</html>