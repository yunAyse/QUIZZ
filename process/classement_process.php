<?php
require_once('./connexion/connect.php');
$showPseudo =  $_SESSION['user']['pseudo'];
$showScore = $_SESSION['user']['score']; 
// top 3
$sql = "SELECT  pseudo,score FROM user ORDER BY score DESC";
$showTop = $db->query($sql);
$showTops = $showTop->fetchAll();

$topTenUsers =array_slice($showTops,0,10);

$topThreeUsers = array_slice($showTops, 0, 3);


?>

