<?php
require_once('../connexion/connect.php');

$request = $db->query("SELECT * FROM response JOIN question ON response.question_id = question.user_id");
$joinresponseAndQuestions = $request-> fetchAll();
foreach ($joinresponseAndQuestions as $joinresponseAndQuestion) {
   

}





?>
