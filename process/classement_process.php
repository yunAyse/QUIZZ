<?php
require_once('./connexion/connect.php');


$showPseudo =  $_SESSION['user']['pseudo'];
$showScore = $_SESSION['user']['score']; 
$showCharts[] = 
// top 3
$sql = "SELECT  pseudo,score FROM user ORDER BY score DESC";
$showTop = $db->query($sql);
$showTops = $showTop->fetchAll();


$topThreeUsers = array_slice($showTops, 0, 3);



?>

