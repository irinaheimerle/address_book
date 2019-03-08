<?php
    session_start();
    if($_SESSION['loggedin'] == false) header("Location: ../index.php");
    class Contact { 
        public $id;
        public $first_name;
        public $surname;
        public $phone_number;
        public $email_address;
        public $postal_code;
        public $birthday;
        

        public function addContact() {
            include("../authorized/connection_details.php");
            if($stmt = mysqli_prepare($conn,"INSERT INTO address_book (first_name, surname, phone_number, email_address, postal_code, birthday) VALUES (?,?,?,?,?,?)")) {
                $stmt->bind_param("ssssss", $this->first_name, $this->surname, $this->phone_number, $this->email_address, $this->postal_code, $this->birthday);
                $sent = $stmt->execute();

                if($sent) header("Location: ../views/authenticated_view.php");
                else header("Location: ../index.php");exit();
            }
        }

        public function editContact() {
            include("../authorized/connection_details.php");
            if ($stmt = mysqli_prepare($conn, "UPDATE address_book SET first_name=?, surname=?, email_address=?, phone_number=?, postal_code=?, birthday=? WHERE id=?")) {
                $stmt->bind_param('ssssssi', $this->first_name, $this->surname, $this->email_address, $this->phone_number, $this->postal_code, $this->birthday, $this->id); 
                $sent = $stmt->execute();

                if($sent) header("Location: ../views/authenticated_view.php");
                else header("Location: ../index.php");exit();
            }


            
        }

        public function deleteContact() {
            include("../authorized/connection_details.php");
            if($stmt = mysqli_prepare($conn, "DELETE FROM address_book WHERE id=?"));
            $stmt->bind_param('i', $this->id);
            $sent = $stmt->execute();

            if($sent) header("Location: ../views/authenticated_view.php");
            else header("Location: ../index.php");exit();
        }

        
        
    } 