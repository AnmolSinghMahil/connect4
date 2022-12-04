<?php
include "users.php";
include "rdbms.php";

$userID = isset($_GET["userID"])? json_decode($_GET["userID"]): 1;
$id = strval($userID);

$sql= "SELECT gamesID ,result , timePlayed FROM `games` WHERE userID = $id";
$result = $conn->query($sql);

$arr = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $user =new Usergames($row["gamesID"],$row["result"],$row["timePlayed"]);
        $arr[] = $user;
    }
    echo json_encode($arr);
} else {
    $bad1=[ 'bad' => 1];
    echo json_encode($bad1);	
}
?>