<?php 
    session_start();
    include("../authorized/connection_details.php");

    if(!isset($_SESSION)) header("Location: ../index.php");

    $sql = "SELECT * FROM address_book";
    $result = $conn->query($sql);

    $contacts = array();

    while($row = $result->fetch_assoc()) array_push($contacts, $row);

    $_SESSION['contacts'] = $contacts;

    if(isset($_GET["filter_birthday"])) {
        $sql = "SELECT * FROM address_book ORDER BY birthday DESC";

        $result = $conn->query($sql);
        $conn->close();
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

            <!-- DATA SECTION: CONTACTS  -->
            <div class="data">
                <div class="data__options">
                    <form action="../controllers/Database.php">
                        <p>Functions</p>
                        <input type="submit" name="export_csv" value="Export CSV"><br><br>
                        <input type="submit" name="import_csv" value="Import CSV"><br><br>
                        <a class="data__contacts--link" href="./add_view.php">Add Contact</a>
                    </form>
                </div>
                <div class="data__contacts">
                    <h2 class="data__contacts--title">CONTACTS</h2>
                    <div class="data__contacts--filter">
                        <form action=""><input type="submit" class="data__contacts--link" value="Filter Contacts by Birthday Month" name="filter_birthday"></span></form>
                    </div>
                    <table class="data__contacts--sections">
                        <th class="data__contacts--sections--title">Customer ID</th>
                        <th class="data__contacts--sections--title">Customer Name</th>
                        <th class="data__contacts--sections--title">Customer Phone #</th>
                        <th class="data__contacts--sections--title">Customer Postal Code</th>
                        <th class="data__contacts--sections--title">Customer Birthday</th>

                        <?php foreach($_SESSION["contacts"] as $contact) {
                            echo "<tr class='data__contacts--sections--row'><td class='data__contacts--sections--data'>"; 
                            echo $contact['id'];
                            echo "</td><td class='data__contacts--sections--data'>";   
                            echo $contact['first_name'] . " " . $contact["surname"];
                            echo "</td><td class='data__contacts--sections--data'>";    
                            echo $contact['phone_number'];
                            echo "</td><td class='data__contacts--sections--data'>"; 
                            echo $contact['postal_code'];
                            echo "</td><td class='data__contacts--sections--data'>"; 
                            echo $contact['birthday'];
                            echo " " . '<a href=./edit_view.php?id=', $contact["id"] ,' class="data__contacts--link">Edit</a>' . " " . '<a href="./delete_view.php" class="data__contacts--link">Delete</a>';
                            echo "</td></tr>"; 
                        }?>
                    </table>
                </div>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="./dist/css.js"></script>
    </body>
</html>