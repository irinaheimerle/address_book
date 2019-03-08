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
                //start the session
                session_start();
                //bind params to the stmt
                $stmt->bind_param('s', $this->username); 
                $stmt->execute();
                //store result
                $stmt->store_result();
                
                //bind result
                $stmt->bind_result($username, $db_password);
                //fetch the result
                $stmt->fetch();

                //check the password!!!
                if (password_verify($this->password, $db_password)) {
                    //set loggedin to true
                    $_SESSION["loggedin"] = true;
                    //set session username
                    $_SESSION['username'] = $this->username;
                    //set session contacts if needed
                    $_SESSION['contacts'] = array();
                    //redirect
                    header("Location: ../views/authenticated_view.php");exit();
                } else {
                    //redirect
                    header("Location: ../index.php");exit();
                }
            }
        }
        
        
    }
