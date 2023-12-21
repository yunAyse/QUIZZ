<p>e</p>
<p>e</p>
<p>e</p>

<?php
require_once('../connexion/connect.php');

// envoila liaison de table a question_process.php
$varId = 1;

$request = $db->prepare("SELECT *  FROM question WHERE id = $varId");
$request->execute();
$questions = $request->fetchAll();

$result =[];

foreach ($questions as $question) {   
//  var_dump($question);
    // var_dump($question['1']);
    $selectQuestion = $question['0'];
    $request = $db->prepare("SELECT *  FROM response WHERE question_id = $selectQuestion");
    $request->execute();
    $responses = $request->fetchAll();

    foreach ($responses as $response) {
        // var_dump($response['1']);
        $resultResponses =  $response['1'];
        array_push($result, $resultResponses);
    
    };
} 
$resultQuestion = $question['1'];

$requestrandom = $db->query("SELECT* FROM response WHERE question_id = $selectQuestion ORDER BY RAND() ");
$resultRandom = $requestrandom->fetchAll();
$results = $resultRandom;
foreach ($results as $result) {
    $resultEchoRandom = $result['1'];

}
echo $resultEchoRandom;



