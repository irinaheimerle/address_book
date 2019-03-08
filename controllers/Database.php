<?php 
    include("../models/Contact.php");
    include("../models/Authentication.php");
    include("../models/Files.php");

    if(isset($_GET["login"]) && isset($_GET["username"]) && isset($_GET["password"])) {
        $user = new Authentication();

        $user->username = $_GET["username"];
        $user->password = $_GET["password"];

        $user->login();
        
    }

    if(isset($_GET["filter_birthday"])) {
        $contact = new Contact();

        $contact->filterContacts();
    }

    if(isset($_GET["export_csv"])) {
        $file = new Files();

        $file->exportCSV();
    }

    if(isset($_GET["add"])) {
        if(isset($_GET["first_name"]) && isset($_GET["surname"]) && isset($_GET["phone_number"]) && isset($_GET["email_address"]) && isset($_GET["postal_code"]) && isset($_GET["birthday"])) {
            $contact = new Contact();
            $contact->first_name = $_GET["first_name"];
            $contact->surname = $_GET["surname"];
            $contact->phone_number = $_GET["phone_number"];
            $contact->email_address = $_GET["email_address"];
            $contact->postal_code = $_GET["postal_code"];
            $contact->birthday = $_GET["birthday"];
    
            $contact->addContact();
        }
    }
    

    if(isset($_GET["edit"])) {
        if(isset($_GET["id"]) && isset($_GET["first_name"]) && isset($_GET["surname"]) && isset($_GET["phone_number"]) && isset($_GET["postal_code"]) && isset($_GET["birthday"])) {
            $contact = new Contact();
            $contact->id = $_GET["id"];
            $contact->first_name = $_GET["first_name"];
            $contact->surname = $_GET["surname"];
            $contact->email_address = $_GET["email_address"];
            $contact->phone_number = $_GET["phone_number"];
            $contact->postal_code = $_GET["postal_code"];
            $contact->birthday = $_GET["birthday"];
    
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

    