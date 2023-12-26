<?php
require_once('../connexion/connect.php');
session_start();
var_dump($_POST['responseuser']);

$responseOfQuestion = $_SESSION['user']['count'];
$addScrore =  $_SESSION['user']['score'];
$pseudo = $_SESSION['user']['pseudo'];
var_dump($pseudo);


if (isset($_POST['responseuser']) && !empty($_POST['responseuser'])) {
    // lier les tableau question response et recuperé la valeur true
    $sql = "SELECT * FROM question JOIN response ON user_id = question_id WHERE question_id = $responseOfQuestion AND response_true ";
    $request = $db->query($sql);
    $request->execute();
    $jointArray = $request->fetch();
    // init les deux valeurs de comparaison tableau et response
   
    $compareStringArray = $jointArray['response'];
    // tranformer le tableau en chaine de cractere
    // $compareStringArray  = implode('', $compareStringArray);
    $compareStringPost = $_POST['responseuser'];
    // var_dump($compareStringArray );
    // var_dump( $compareStringPost);
    
    // comparé les deux chaine de caracter
    if (strcmp($compareStringArray, $compareStringPost) == 0) {
        // ajouter un point si la chaine de caracter est la meme 
        $addScrore++;
        var_dump("le scrore sajoute");
        $_SESSION['user']['score'] = $addScrore;
        var_dump($addScrore);
        // mise a jour dans $db
        $user = [
            'pseudo' => $pseudo,
            'score' => $addScrore,
        ];
        $sql = "UPDATE user SET pseudo=:pseudo, score=:score WHERE pseudo = :pseudo ";
        $stmt= $db->prepare($sql);
        $stmt->execute($user);

    }
    $responseOfQuestion++;
   $_SESSION['user']['count'] = $responseOfQuestion ;

var_dump('question de la bd : ',$responseOfQuestion);
var_dump('reponce de la db',$compareStringArray);
var_dump('reponce de user :', $compareStringPost);
var_dump('score : ', $addScrore);

    header('Location: ../page/question.php');
    // -------------------------------------------------------------------


    // 1:recuperer la valeur du tableau qui est true 
    // 2:comparer la valeur $_POSTresponse a la valeur du tableau
    // 3:si la valeur du tableau est true mettre le resulta en vert sinon en rouge pendant 2Sec


}
