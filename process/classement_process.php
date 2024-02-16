<?php
require_once('./connexion/connect.php');



$showPseudo =  $_SESSION['user']['pseudo'] ? $_SESSION['user']['pseudo']:['(il faut faire une parti)'];
$showScore = $_SESSION['user']['score'] ? $_SESSION['user']['score']: 0; 
$showCharts[] = 
// top 3
$sql = "SELECT  pseudo,score FROM user ORDER BY score DESC";
$showTop = $db->query($sql);
$showTops = $showTop->fetchAll();


$topThreeUsers = array_slice($showTops, 0, 3);



?>

