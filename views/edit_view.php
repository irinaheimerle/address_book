<?php 
    session_start();
    if($_SESSION['loggedin'] == false) header("Location: ../index.php");
    
    //include db creds
    include("../authorized/connection_details.php");

    //grab current contact through query string
    $current_contact = (int) substr($_SERVER['QUERY_STRING'], 3, strlen($_SERVER['QUERY_STRING']));
    
    $sql = "SELECT * FROM address_book WHERE id=$current_contact";
    $result = $conn->query($sql);

    $contact = array();

    while($row = $result->fetch_assoc()) array_push($contact, $row);

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
                    <?php foreach($contact as $contact_data) { 
                            foreach($contact_data as $key => $data ) { ?>
                                <?php if($key == 'id') { ?>
                                    <!-- IF KEY IS id put into hidden field to send back to server  -->
                                    <input type="hidden" name="id" value="<?php echo $data; ?>">
                                <?php } else { ?>
                                    <!-- IF KEY IS birthday put into date field for usability  -->
                                    <input <?php if($key == 'birthday') echo 'type="date"'; else echo 'type="text"'; ?> class="data__login--item" placeholder="<?php echo $data ?>" name="<?php echo $key ?>"><br>
                                <?php } ?>
                            <?php } ?>
                    <?php }?>
                    <input type="submit" class="data__login--button" name="submit" value="EDIT CONTACT">
                    <a href="../views/authenticated_view.php" class="data__login--button">CANCEL</a>
                    <input type="hidden" name="edit" value="edit">
                </form>
            </div>
        </div>
    </body>
</html>