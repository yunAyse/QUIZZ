
<?php
require_once('../connexion/connect.php');
// initi des question
$addCount = $_SESSION['user']['count'];

$request = $db->prepare("SELECT *  FROM question WHERE id = $addCount");
$request->execute();
$questions = $request->fetch();
if ($questions == null) {
    header('Location: ../index.php');
}
// selectionner la question
$selectQuestion = $questions['0'];

// select la response par rapport a la question pour afficher en front
    $selectQuestion = $questions['0'];

    $request = $db->prepare("SELECT *  FROM response WHERE question_id = $selectQuestion");
    $request->execute();
    $responses = $request->fetchAll();
//   stokage des response pour random
$result =[];
// add une par une pour random()

        foreach ($responses as $response) {
        $resultResponses =  $response['1'];
        array_push($result, $resultResponses);
    };      
// random response
$requestrandom = $db->query("SELECT* FROM response WHERE question_id = $selectQuestion ORDER BY RAND() ");
$resultRandom = $requestrandom->fetchAll();
$results = $resultRandom;

foreach ($results as $result) {
    $resultEchoRandom[] = $result['1'];
}