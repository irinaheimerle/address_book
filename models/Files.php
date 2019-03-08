<?php 
    Class Files {
        

        public function exportCSV() {
            include("../authorized/connection_details.php");
            $result = mysqli_query($conn, 'SELECT * FROM address_book');
            
            $fp = fopen('file.csv', 'w');

            while($row = $result->fetch_assoc()) fputcsv($fp, $row);

            fclose($fp);
        }
    }