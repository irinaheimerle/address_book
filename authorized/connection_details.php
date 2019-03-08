<?php
$servername = "localhost";
$username = "heimerle_address";
$password = "Lacrosse33!";
$database_name = "heimerle_address_book";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


