<?php
require_once('../connexion/connect.php');
session_start();
var_dump($_POST['response']);

$responseOfQuestion = $_SESSION['user']['count'];
$addScrore =  $_SESSION['user']['score'];
$addScrore = $addScrore + 1;



if (isset($_POST['response']) && !empty($_POST['response'])) {

    $sql = "SELECT $responseOfQuestion , response FROM question JOIN response ON user_id = question_id WHERE response_true = 1 ";

    $request = $db->query($sql);
    $request->execute();

    $jointArray[0] = $request->fetch(PDO::FETCH_ASSOC);

    $selectString = $jointArray[0]['response'];

    if ($selectString === $_POST['response']) {
        $countTry = $_SESSION['user']['count']++;
        
    } else {
        $countTry = $_SESSION['user']['count']++;
        $addScrore = $addScrore + 1;
    }
    header('Location: ../page/question.php');

    // $sql = "SELECT * FROM question WHERE user_id = $responseOfQuestion";
    // $request = $db->query($sql);
    // $resolvquestion =  $request->fetch(PDO::FETCH_ASSOC);
    // var_dump($resolvquestion);


    // $sql = "SELECT response_true FROM response WHERE response_true = true AND question_id = $responseOfQuestion ";
    // $request = $db->query($sql);
    // $responseTrue =  $request->fetch();

    // var_dump($responseTrue);

    // 1:recuperer la valeur du tableau qui est true 
    // 2:comparer la valeur $_POSTresponse a la valeur du tableau
    // 3:si la valeur du tableau est true mettre le resulta en vert sinon en rouge pendant 2Sec


}
