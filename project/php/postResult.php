<?php

include "rdbms.php";
$userID = isset($_GET['userID']) ? json_decode($_GET['userID']) : "Not correct user";
$result = isset($_GET['result']) ? json_decode($_GET['result']) : "Not correct winner";
$timePlayed = isset($_GET['timePlayed']) ? json_decode($_GET['timePlayed']) : "nothing";

$sql = "INSERT INTO games (userID,result, timePLayed) VALUES ('$userID','$result','$timePlayed')";
if($conn->query($sql) == TRUE) {
    echo "New recrod created successfully";
}
else {
    echo "error" . $sql . "<br>" . $conn->error;
}
$conn->close();
?>