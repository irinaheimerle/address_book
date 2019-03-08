<?php   
    include_once("../models/Contact.php");
    Class Files {
        public $given_file;
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
            if($_SESSION['loggedin'] == true) header("Location: ../views/authenticated_view.php");
        }

        public function importCSV() {
            // Allowed mime types
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

            $new_contacts = array();

            //check to see if the file exists (and the correct type) and is bigger than 0
            if($this->given_file['size'] > 0 && in_array($this->given_file['type'], $csvMimes)) {
                $filename = $this->given_file['tmp_name'];
                $file = fopen($filename, "r");
                while(($reading = fgetcsv($file))) {
                    //make a new contact to add to DB!
                    $addContact = new Contact();
                    //sanitize and enter data
                    $addContact->first_name = filter_var($reading[1], FILTER_SANITIZE_STRING);
                    $addContact->surname =filter_var($reading[2], FILTER_SANITIZE_STRING);
                    $addContact->phone_number = filter_var($reading[3], FILTER_SANITIZE_STRING);
                    $addContact->email_address = filter_var($reading[4], FILTER_SANITIZE_STRING);
                    $addContact->postal_code = filter_var($reading[5], FILTER_SANITIZE_STRING);
                    $addContact->birthday = filter_var($reading[6], FILTER_SANITIZE_STRING);

                    $addContact->addContact();
                    
                }
            } else header("Location: ../views/import_view.php");exit();
        }
        
    }