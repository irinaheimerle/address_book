<?php
    session_start();
    if($_SESSION['loggedin'] == false) header("Location: ../index.php");
    include("../authorized/connection_details.php");
    class Contact {
        //public variables 
        public $id;
        public $first_name;
        public $surname;
        public $phone_number;
        public $email_address;
        public $postal_code;
        public $birthday;
        
        //public functions

        //add contact function
        public function addContact() {
            if($stmt = mysqli_prepare($conn,"INSERT INTO address_book (first_name, surname, phone_number, email_address, postal_code, birthday) VALUES (?,?,?,?,?,?)")) {
                $stmt->bind_param("ssssss", $this->first_name, $this->surname, $this->phone_number, $this->email_address, $this->postal_code, $this->birthday);
                $sent = $stmt->execute();

                if($sent) header("Location: ../views/authenticated_view.php");
                else header("Location: ../index.php");exit();
            }
        }

        //edit contact function
        public function editContact() {
            if ($stmt = mysqli_prepare($conn, "UPDATE address_book SET first_name=?, surname=?, email_address=?, phone_number=?, postal_code=?, birthday=? WHERE id=?")) {
                $stmt->bind_param('ssssssi', $this->first_name, $this->surname, $this->email_address, $this->phone_number, $this->postal_code, $this->birthday, $this->id); 
                $sent = $stmt->execute();

                if($sent) header("Location: ../views/authenticated_view.php");
                else header("Location: ../index.php");exit();
            }


            
        }

        //delete contact function
        public function deleteContact() {
            //stmt and params
            if($stmt = mysqli_prepare($conn, "DELETE FROM address_book WHERE id=?"));
            $stmt->bind_param('i', $this->id);
            $sent = $stmt->execute();

            if($sent) header("Location: ../views/authenticated_view.php");
            else header("Location: ../index.php");exit();
        }

        
        
    } 