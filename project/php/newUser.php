<?php

include 'rdbms.php';

if(isset($_POST['username']) ) {
    json_decode(($_POST['username'])) 
}else {
    echo "enter a username";
}

if(isset($_POST['password']) ) {
    json_decode(($_POST['password'])) 
}else {
    echo "enter a password";
}



$sql = "INSERT INTO users (username,password) VALUES ('$user','$password')";
if($conn->query($sql) == TRUE) {
    echo "New recrod created successfully";
}
else {
    echo "error" . $sql . "<br>" . $conn->error;
}
$conn->close();
?>