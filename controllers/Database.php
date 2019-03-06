<?php 
    include("../models/Contact.php");

    if(isset($_GET["first_name"]) && isset($_GET["surname"]) && isset($_GET["phone_number"]) && isset($_GET["postal_code"]) && isset($_GET["birthday"])) {
        $contact = new Contact();
        $contact->first_name = $_GET["first_name"];
        $contact->surname = $_GET["surname"];
        $contact->phone_number = $_GET["phone_number"];
        $contact->postal_code = $_GET["postal_code"];
        $contact->birthday = $_GET["birthday"];

        $contact->addContact();

        
    }