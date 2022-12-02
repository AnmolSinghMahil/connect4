<?php

// open and load the content of the database
$servername = "localhost"; // default server name
$username = "root"; // user name that you created
$password = ""; // password that you created
$dbname = "connect4";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";




?>