<?php 
    include("../authorized/connection_details.php");
    $sql = "SELECT * FROM address_book";
    $result = $conn->query($sql);

    $contacts = array();
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
                <p class="main__subtitle" id="subtitle">Administration: Welcome, Rin</p><br>
            </div>

            <!-- DATA SECTION: CONTACTS  -->
            <div class="data">
                <div class="data__contacts">
                    <h2 class="data__contacts--title">CONTACTS</h2>
                    <div class="data__contacts--filter">
                        <span class="data__contacts--filter--title">Filters: </span><a href="" class="data__contacts--link">Birthday Month</a></span>
                    </div>
                    <table class="data__contacts--sections">
                        <th class="data__contacts--sections--title">Customer ID</th>
                        <th class="data__contacts--sections--title">Customer Name</th>
                        <th class="data__contacts--sections--title">Customer Phone #</th>
                        <th class="data__contacts--sections--title">Customer Postal Code</th>
                        <th class="data__contacts--sections--title">Customer Birthday</th>

                        <?php while($row = $result->fetch_assoc()) {
                            echo "<tr class='data__contacts--sections--row'><td class='data__contacts--sections--data'>"; 
                            echo $row['id'];
                            echo "</td><td class='data__contacts--sections--data'>";   
                            echo $row['first_name'] . " " . $row["surname"];
                            echo "</td><td class='data__contacts--sections--data'>";    
                            echo $row['phone_number'];
                            echo "</td><td class='data__contacts--sections--data'>"; 
                            echo $row['postal_code'];
                            echo "</td><td class='data__contacts--sections--data'>"; 
                            echo $row['birthday'];
                            echo " " . '<a href="./edit_view.php?id=5" class="data__contacts--link">Edit</a>' . " " . '<a href="./delete_view.php" class="data__contacts--link">Delete</a>';
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