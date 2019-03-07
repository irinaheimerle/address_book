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
                <p class="main__subtitle" id="subtitle">Administration: Edit Contact</p><br>
            </div>

            <!-- DATA SECTION: FORM | CONTACTS  -->
            <div class="data">
                <form class="data__login" action="../controllers/Database.php">
                    <h2 class="data__login--title">EDIT CONTACT</h2>
                    <?php foreach($contacts[0] as $key => $contact_data) { ?>
                        <input type="text" class="data__login--item" placeholder="<?php echo $contact_data ?>" name="<?php echo $key ?>"><br>
                    <?php }?>
                    <input type="submit" class="data__login--button" name="submit" value="EDIT CONTACT">
                    <input type="hidden" name="edit" value="edit">
                </form>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="./dist/css.js"></script>
    </body>
</html>