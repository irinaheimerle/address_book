<?php 
    session_start();
    include("../authorized/connection_details.php");

    if($_SESSION['loggedin'] == false) header("Location: ../index.php");

    //grab all contacts
    $sql = "SELECT * FROM address_book";
    //send out query
    $result = $conn->query($sql);

    $contacts = array();

    while($row = $result->fetch_assoc()) array_push($contacts, $row);

    //for filtering
    $months = array();
    $current_contacts = array();
    
    //filter by month if necessary
    foreach($contacts as $contact) {
        foreach($contact as $key => $contact_data) {
            if($key == 'birthday') {
                //pull month out of full date
                $month = substr($contact_data, 5, -3);
                if(isset($_GET["filter_birthday"])) {
                    if($month == $_GET["selected_month"]) array_push($current_contacts, $contact);
                }
                else if(!in_array($month, $months)) {
                    //push it into the array for content
                    array_push($months, $month);
                }
            }
        }
    }
    
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
                <p class="main__subtitle" id="subtitle">Administration: Welcome, <?php echo $_SESSION["username"]; ?></p><br>
            </div>

            <!-- DATA SECTION: FUNCTIONS / OPTIONS  -->
            <div class="data">
                <div class="data__options">
                    <form action="../controllers/Database.php">
                        <p>Functions</p>
                        <input type="submit" name="export_csv" value="Export CSV"><br><br>
                        <a class="data__contacts--link" href="./import_view.php">Import CSV</a><br>
                        <a class="data__contacts--link" href="./add_view.php">Add Contact</a>
                    </form>
                </div>
                <!-- DATA SECTION: CONTACTS  -->
                <div class="data__contacts">
                    <h2 class="data__contacts--title">CONTACTS</h2>
                    <?php if(!isset($_GET["filter_birthday"])) { ?>
                        <div class="data__contacts--filter">
                            <a href="#" id="filter_months" class="data__contacts--link" name="filter_birthday">Filter Contacts by Birthday Month</a></span>
                            <div id="show_months" class="data__contacts--months">
                                <form action="">
                                    <!-- OUTPUT MONTHS FOUND IN DATABASE CURRENTLY -->
                                    <?php foreach($months as $month) { ?> 
                                        <input type="submit" value="<?php echo $month ?>" name="selected_month">
                                    <?php } ?>
                                    <input type="hidden" name="filter_birthday" value="filter_birthday">
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(isset($_GET["filter_birthday"])) {
                        echo '<a href="./authenticated_view.php" class="data__contacts--link">Refresh</a><br>';
                    } ?>
                    <!-- TABLE TO SHOW CONTACT DATA -->
                    <div class="data__contacts--table">
                        <table class="data__contacts--table--sections">
                            <th class="data__contacts--table--sections--title">ID</th>
                            <th class="data__contacts--table--sections--title">Name</th>
                            <th class="data__contacts--table--sections--title">Phone #</th>
                            <th class="data__contacts--table--sections--title">Email Address</th>
                            <th class="data__contacts--table--sections--title">Postal Code</th>
                            <th class="data__contacts--table--sections--title">Birthday</th>
                            
                            <?php if(count($current_contacts)) {
                                foreach($current_contacts as $contact) {
                                    echo "<tr class='data__contacts--sections--row'><td class='data__contacts--sections--data'>"; 
                                    echo $contact['id'];
                                    echo "</td><td class='data__contacts--sections--data'>";   
                                    echo $contact['first_name'] . " " . $contact["surname"];
                                    echo "</td><td class='data__contacts--sections--data'>";
                                    echo $contact['phone_number'];
                                    echo "</td><td class='data__contacts--sections--data'>";
                                    echo $contact['email_address'];
                                    echo "</td><td class='data__contacts--sections--data'>"; 
                                    echo $contact['postal_code'];
                                    echo "</td><td class='data__contacts--sections--data'>"; 
                                    echo $contact['birthday'];
                                    echo "<br>" . '<a href=./edit_view.php?id=', $contact["id"] ,' class="data__contacts--link">Edit</a>' . " " . '<a href=./delete_view.php?id=', $contact["id"] ,' class="data__contacts--link">Delete</a>';
                                    echo "</td></tr>"; 
                                } 
                            } else foreach($contacts as $contact) {
                                echo "<tr class='data__contacts--sections--row'><td class='data__contacts--sections--data'>"; 
                                echo $contact['id'];
                                echo "</td><td class='data__contacts--sections--data'>";   
                                echo $contact['first_name'] . " " . $contact["surname"];
                                echo "</td><td class='data__contacts--sections--data'>";
                                echo $contact['phone_number'];
                                echo "</td><td class='data__contacts--sections--data'>";
                                echo $contact['email_address'];
                                echo "</td><td class='data__contacts--sections--data'>"; 
                                echo $contact['postal_code'];
                                echo "</td><td class='data__contacts--sections--data'>"; 
                                echo $contact['birthday'];
                                echo "<br>" . '<a href=./edit_view.php?id=', $contact["id"] ,' class="data__contacts--link">Edit</a>' . " " . '<a href=./delete_view.php?id=', $contact["id"] ,' class="data__contacts--link">Delete</a>';
                                echo "</td></tr>"; 
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="../dist/css.js"></script>
    </body>
</html>