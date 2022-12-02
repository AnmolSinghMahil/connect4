<?php

include 'leaderboard.php';
include 'rdbms.php';


$winsASC = isset($_GET['winsASC']) ? json_decode(($_GET['winsASC'])) : 'nothing';
$winsDESC= isset($_GET['winsDESC']) ? json_decode(($_GET['winsDESC'])) : 'nothing';
$gamesASC= isset($_GET['gamesASC']) ? json_decode(($_GET['gamesASC'])) : 'nothing';
$gamesDESC= isset($_GET['gamesDESC']) ? json_decode(($_GET['gamesDESC'])) : 'nothing';
$timeASC= isset($_GET['timeASC']) ? json_decode(($_GET['timeASC'])) : 'nothing';
$timeDESC= isset($_GET['timeDESC']) ? json_decode(($_GET['timeDESC'])) : 'nothing';
$lossASC= isset($_GET['lossASC']) ? json_decode(($_GET['lossASC'])) : 'nothing';
$lossDESC= isset($_GET['lossDESC']) ? json_decode(($_GET['lossDESC'])) : 'nothing';


if($winsASC == 'winsASC') {
    $sql = "SELECT username, COUNT(result) AS totalgames, 
COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
FROM `users` INNER JOIN `games` ON games.userID = users.userID
GROUP BY username
ORDER BY wins ASC";
    $result = $conn->query($sql);
}else if ($winsDESC == 'winsDESC' ) {
    
    $sql = "SELECT username, COUNT(result) AS totalgames, 
COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
FROM `users` INNER JOIN `games` ON games.userID = users.userID
GROUP BY username
ORDER BY wins DESC";
    $result = $conn->query($sql);
}
else if ($gamesASC == 'gamesASC') {
    $sql = "SELECT username, COUNT(result) AS totalgames, 
COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
FROM `users` INNER JOIN `games` ON games.userID = users.userID
GROUP BY username
ORDER BY totalgames ASC";
    $result = $conn->query($sql);
}else if ($gamesDESC == 'gamesDESC') {
    $sql = "SELECT username, COUNT(result) AS totalgames, 
COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
FROM `users` INNER JOIN `games` ON games.userID = users.userID
GROUP BY username
ORDER BY totalgames DESC";
    $result = $conn->query($sql);
}
else if ($timeASC == 'timeASC') {
    $sql = "SELECT username, COUNT(result) AS totalgames, 
    COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
    COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
    SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
    FROM `users` INNER JOIN `games` ON games.userID = users.userID
    GROUP BY username
    ORDER BY timeplayed ASC";
    $result = $conn->query($sql);
}else if ($timeDESC == 'timeDESC') {
    $sql = "SELECT username, COUNT(result) AS totalgames, 
    COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
    COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
    SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
    FROM `users` INNER JOIN `games` ON games.userID = users.userID
    GROUP BY username
    ORDER BY timeplayed DESC";
    $result = $conn->query($sql);
}
else if ($lossASC == 'lossASC') {
    $sql = "SELECT username, COUNT(result) AS totalgames, 
    COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
    COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
    SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
    FROM `users` INNER JOIN `games` ON games.userID = users.userID
    GROUP BY username
    ORDER BY losses ASC";
    $result = $conn->query($sql);
}else if ($lossDESC == 'lossDESC') {
    $sql = "SELECT username, COUNT(result) AS totalgames, 
    COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
    COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
    SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
    FROM `users` INNER JOIN `games` ON games.userID = users.userID
    GROUP BY username
    ORDER BY losses DESC";
    $result = $conn->query($sql);
}





// $sql ="SELECT * FROM Cars ORDER BY title DESC";
// $sql = "SELECT * FROM Cars";
// $result = $conn->query($sql);

$arr = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $user =new Leaderboard($row["username"],$row["totalgames"],$row["wins"],$row["losses"],$row["timeplayed"]);
        $arr[] = $user;
    }
    echo json_encode($arr);
} else {
    $bad1=[ 'bad' => 1];
    echo json_encode($bad1);	
}




?>