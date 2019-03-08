<?php
    if($_SESSION['loggedin'] === 0) header("Location: ../index.php");
    class Contact { 
        public $id;
        public $first_name;
        public $surname;
        public $phone_number;
        public $postal_code;
        public $birthday;

        public function addContact() {
            include("../authorized/connection_details.php");
            if($stmt = mysqli_prepare($conn,"INSERT INTO address_book (first_name, surname, phone_number, postal_code, birthday) VALUES (?,?,?,?,?)")) {
                $stmt->bind_param("sssss", $this->first_name, $this->surname, $this->phone_number, $this->postal_code, $this->birthday);
                $sent = $stmt->execute();

                if($sent && $_SESSION['loggedin'] === 0) {
                    header("Location: ../views/authenticated_view.php");
                    exit();
                }
                else header("Location: ../index.php");exit();
            }
        }

        public function editContact() {
            include("../authorized/connection_details.php");
            if ($stmt = mysqli_prepare($conn, "UPDATE address_book SET first_name=?, surname=?, phone_number=?, postal_code=?, birthday=? WHERE id=?")) {
                $stmt->bind_param('sssssi', $this->first_name, $this->surname, $this->phone_number, $this->postal_code, $this->birthday, $this->id); 
                $sent = $stmt->execute();

                if($sent && isset($_SESSION)) {
                    header("Location: ../views/authenticated_view.php");
                    exit();
                }
                else header("Location: ../index.php");exit();
            }


            
        }

        public function deleteContact() {
            include("../authorized/connection_details.php");
            if($stmt = mysqli_prepare($conn, "DELETE FROM address_book WHERE id=?"));
            $stmt->bind_param('i', $this->id);
            $sent = $stmt->execute();

            if($sent && isset($_SESSION)) {
                header("Location: ../views/authenticated_view.php");
                exit();
            }
            else header("Location: ../index.php");exit();
        }

        
        
    } 