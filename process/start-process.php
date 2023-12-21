<?php
require_once('../connexion/connect.php');

// envoila liaison de table a question_process.php
$varId = 1;

$request = $db->prepare("SELECT *  FROM question WHERE id = $varId");
$request->execute();

$questions = $request->fetchAll();

foreach ($questions as $question) {

    var_dump($question['1']);

    $selectQuestion = $question['0'];
    $request = $db->prepare("SELECT *  FROM response WHERE question_id = $selectQuestion");
    $request->execute();
    $responses = $request->fetchAll();

    foreach ($responses as $response) {

        var_dump($response['1']);

        $resultResponses =  $response['1'];
    };
}
