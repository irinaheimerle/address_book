<?php 
    Class Files {
        public function exportCSV() {
            //include db creds
            include("../authorized/connection_details.php");
            //grab everything from the table
            $result = mysqli_query($conn, 'SELECT * FROM address_book');
            //open file, specify write task
            $fp = fopen('../file.csv', 'w');

            //while there are rows, write row to file
            while($row = $result->fetch_assoc()) fputcsv($fp, $row);

            //close file
            fclose($fp);

            //if session exists, redirect
            //if(isset($_SESSION)) header("Location: ../views/authenticated_view.php");exit();
        }

        // TO-DO: FUNCTION | importCSV
    }