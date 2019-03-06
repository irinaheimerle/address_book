<?php
    class Contact { 
        public $first_name;
        public $surname;
        public $phone_number;
        public $postal_code;
        public $birthday;

        public function addContact() {
            include("../authorized/connection_details.php");
            $sql = "INSERT INTO address_book (first_name, surname, phone_number, postal_code, birthday)
            VALUES ('$this->first_name', '$this->surname', '$this->phone_number', '$this->postal_code', '$this->birthday')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    } 