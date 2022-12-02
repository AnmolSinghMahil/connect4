<?php
include "leaderboard.php";
include "rdbms.php";

$sql = "SELECT username, COUNT(result) AS totalgames, 
COUNT(CASE WHEN result = 'Win' THEN 1 ELSE NULL END) AS wins,
COUNT(CASE WHEN result = 'Loss' THEN 1 ELSE NULL END) AS losses,
SUM(ADDTIME('00:00:00.000000',timePlayed)) AS timeplayed
FROM `users` INNER JOIN `games` ON games.userID = users.userID
GROUP BY username
ORDER BY timeplayed ASC";
$result = $conn->query($sql);

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