<?php 
    include("../authorized/connection_details.php");
    $sql = "SELECT * FROM address_book";
    $result = $conn->query($sql);

    $contacts = array();
    while($row = $result->fetch_assoc()) array_push($contacts, $row);
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
                <p class="main__subtitle" id="subtitle">Administration: EDIT Contact</p><br>
            </div>

            <!-- DATA SECTION: FORM | CONTACT   S  -->
            <div class="data">
                <form class="data__login" action="../controllers/Database.php">
                    <h2 class="data__login--title">DELETE CONTACT</h2>
                    <p>Are you sure you want to delete customer <?php echo $contacts[0]["id"]; ?></p>
                    <input type="submit" class="data__login--item" value="Yes"><br>
                    <a href="./authenticated_view.php" class="data__login--item">Cancel</a>
                    <input type="hidden" class="data__login--item" name="id" value="<?php echo $contacts[0]["id"]; ?>"><br>
                    <input type="hidden" class="data__login--item" name="delete" value="delete"><br>
                </form>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="./dist/css.js"></script>
    </body>
</html>