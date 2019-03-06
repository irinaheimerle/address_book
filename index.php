<?php 
    include("./authorized/connection_details.php");
    $sql = "SELECT * FROM address_book";
    $result = $conn->query($sql);

    $contacts = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($contacts, $row);
        }
    }        
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
                <form class="data__login" action="./views/add_view.php">
                    <h2 class="data__login--title">LOGIN</h2>
                    <input type="text" class="data__login--item" placeholder="username" name="username"><br>
                    <input type="password" class="data__login--item" placeholder="password" name="password"><br>
                    <input type="submit" class="data__login--button" value="LOGIN">
                </form>

                <div class="data__contacts">
                    <h2 class="data__contacts--title">CONTACTS</h2>
                    <?php if(count($contacts) > 0) { ?>
                        <?php foreach($contacts as $contact) {
                            echo '<p>' . $contact["first_name"] . " " . $contact["surname"] . '</p>';
                            echo '<a href="">Edit</a>' . " " . '<a href="">Delete</a>';
                        }?>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="./dist/css.js"></script>
    </body>
</html>