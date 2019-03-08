<?php 
    Class Authentication {
        public $username = "";
        public $password = "";
        private $access = false; 

        public function login() {
            session_start();
            include("../authorized/connection_details.php");

            if ($stmt = mysqli_prepare($conn, "SELECT username, password FROM users WHERE username = ?")) {
                $stmt->bind_param('s', $this->username);  // Bind "$email" to parameter.
                $stmt->execute();    // Execute the prepared query.
                $stmt->store_result();
        
                // get variables from result.
                $stmt->bind_result($username, $db_password);
                $stmt->fetch();

                // // TO-DO: HASH PASSWORD
                if (password_verify($this->password, $db_password)) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $this->username;
                    $_SESSION['contacts'] = array();
                    header("Location: ../views/authenticated_view.php");exit;
                }
            }
        }
        
        
    }
