<?php
    class Contact { 
        public $id;
        public $first_name;
        public $surname;
        public $phone_number;
        public $postal_code;
        public $birthday;

        public function addContact() {
            include("../authorized/connection_details.php");
            $sql = "INSERT INTO address_book (first_name, surname, phone_number, postal_code, birthday)
            VALUES ('$this->first_name', '$this->surname', '$this->phone_number', '$this->postal_code', '$this->birthday')";

            if ($conn->query($sql) === TRUE) header("Location: ../views/authenticated_view.php");
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        public function editContact() {
            include("../authorized/connection_details.php");
            $sql = "UPDATE address_book SET first_name='$this->first_name', surname='$this->surname', phone_number='$this->phone_number', postal_code='$this->postal_code', birthday='$this->birthday' WHERE id='$this->id'";

            if ($conn->query($sql) === TRUE) header("Location: ../views/authenticated_view.php");
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        public function deleteContact() {
            include("../authorized/connection_details.php");
            $sql = "DELETE FROM address_book WHERE id=1";

            if ($conn->query($sql) === TRUE) header("Location: ../views/authenticated_view.php");
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        
        
    } 