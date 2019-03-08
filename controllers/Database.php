<?php 
    include("../models/Contact.php");
    include("../models/Authentication.php");
    include("../models/Files.php");

    
    // SECTION | AUTHENTICATION
    if(isset($_GET["login"]) && isset($_GET["username"]) && isset($_GET["password"])) {
        $user = new Authentication();

        $user->username = $_GET["username"];
        $user->password = $_GET["password"];

        $user->login();
        
    }

    
    // SECTION | FILES
    if(isset($_GET["export_csv"])) {
        $file = new Files();

        $file->exportCSV();
    }

    if(isset($_POST["import_csv"])) {
        $file = new Files();

        $file->given_file = $_FILES['given_file'];

        $file->importCSV();
        
    }

    // SECTION | CONTACTS
    if(isset($_GET["add"])) {
        if(isset($_GET["first_name"]) && isset($_GET["surname"]) && isset($_GET["phone_number"]) && isset($_GET["email_address"]) && isset($_GET["postal_code"]) && isset($_GET["birthday"])) {
            $contact = new Contact();
            $contact->first_name = filter_var($_GET["first_name"], FILTER_SANITIZE_STRING);
            $contact->surname =filter_var($_GET["surname"],FILTER_SANITIZE_STRING);
            $contact->phone_number = filter_var($_GET["phone_number"], FILTER_SANITIZE_STRING);
            $contact->email_address = filter_var($_GET["email_address"], FILTER_SANITIZE_STRING);
            $contact->postal_code = filter_var($_GET["postal_code"], FILTER_SANITIZE_STRING);
            $contact->birthday = filter_var($_GET["birthday"], FILTER_SANITIZE_STRING);
    
            $contact->addContact();
        }
    }
    

    if(isset($_GET["edit"])) {
        if(isset($_GET["id"]) && isset($_GET["first_name"]) && isset($_GET["surname"]) && isset($_GET["phone_number"]) && isset($_GET["postal_code"]) && isset($_GET["birthday"])) {
            $contact = new Contact();
            $contact->id = $_GET["id"];
            $contact->first_name = filter_var($_GET["first_name"], FILTER_SANITIZE_STRING);
            $contact->surname =filter_var($_GET["surname"],FILTER_SANITIZE_STRING);
            $contact->phone_number = filter_var($_GET["phone_number"], FILTER_SANITIZE_STRING);
            $contact->email_address = filter_var($_GET["email_address"], FILTER_SANITIZE_STRING);
            $contact->postal_code = filter_var($_GET["postal_code"], FILTER_SANITIZE_STRING);
            $contact->birthday = filter_var($_GET["birthday"], FILTER_SANITIZE_STRING);
    
            $contact->editContact();
        }
    }

    if(isset($_GET["delete"])) {
        if(isset($_GET["id"])) {
            $contact = new Contact();
            $contact->id = $_GET["id"];
            $contact->deleteContact();
        }
    }

    