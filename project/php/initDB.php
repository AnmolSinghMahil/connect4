<?php

// include "rdbms.php";
$servername = "localhost"; // default server name
$username = "root"; // user name that you created
$password = ""; // password that you created
$dbname = "connect4";



$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error ."<br>");
} 
echo "Connected successfully <br>";

// Creation of the database
$sql = "CREATE DATABASE ". $dbname;
if ($conn->query($sql) === TRUE) {
    echo "Database ". $dbname ." created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error ."<br>";
}
$conn->close();


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "CREATE TABLE games(
gamesID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
userID INT(11) NOT NULL,
result  VARCHAR(11) NOT NULL,
timePlayed TIME(6) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table games created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error ."<br>";
}
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "CREATE TABLE users(
userID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username  VARCHAR(20) NOT NULL,
password CHAR(60) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error ."<br>";
}
$conn->close();

?>