<?php
$servername = "localhost";
$username = "address_book";
$password = "root";
$database_name = "address_book";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


