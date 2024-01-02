<?php
require_once('../connexion/connect.php');
session_start();

$responseOfQuestion = $_SESSION['user']['count'];
$addScore =  $_SESSION['user']['score'];
$pseudo = $_SESSION['user']['pseudo'];

if (isset($_POST['responseuser']) && !empty($_POST['responseuser'])) {
    // lier les tableau question response et recuperé la valeur true
    $sql = "SELECT * FROM question JOIN response ON user_id = question_id WHERE question_id = $responseOfQuestion AND response_true ";
    $request = $db->query($sql);
    $request->execute();
    $jointArray = $request->fetch();
    // init les deux valeurs de comparaison tableau et response
    $compareStringArray = $jointArray['response'];

    $compareStringPost = $_POST['responseuser'];
    // comparé les deux chaine de caracter
    if (strcmp($compareStringArray, $compareStringPost) == 0) {
        // ajouter un point si la chaine de caracter est la meme 
        $addScore++;

        $_SESSION['user']['score'] = $addScore;

        // mise a jour dans $db
        $user = [
            'pseudo' => $pseudo,
            'score' => $addScore,
        ];
        $sql = "UPDATE user SET pseudo=:pseudo, score=:score WHERE pseudo = :pseudo ";
        $stmt = $db->prepare($sql);
        $stmt->execute($user);
}

}
$responseOfQuestion++;
$_SESSION['user']['count'] = $responseOfQuestion;
?>





<?php
header('Location: ../page/question.php');
?>