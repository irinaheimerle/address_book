<?php 
    // AUTHENTICATION CLASS
    Class Authentication {
        // public variables
        public $username = "";
        public $password = "";
        
        //public functions
        public function login() {
            include("../authorized/connection_details.php");

            if ($stmt = mysqli_prepare($conn, "SELECT username, password FROM users WHERE username = ?")) {
                session_start();
                $stmt->bind_param('s', $this->username); 
                $stmt->execute();
                $stmt->store_result();
        
                $stmt->bind_result($username, $db_password);
                $stmt->fetch();

                if (password_verify($this->password, $db_password)) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION['username'] = $this->username;
                    $_SESSION['contacts'] = array();
                    header("Location: ../views/authenticated_view.php");exit();
                } else {
                    header("Location: ../index.php");exit();
                }
            }
        }
        
        
    }
