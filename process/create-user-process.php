<?php

require_once('../connexion/connect.php');
session_start();

if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    // init 3 values
    $score = 0;
    $count = 1;
    $pseudo = $_POST['pseudo'];
    
    // created array for $_SESSION
    $user = [
        'pseudo' => $pseudo,
        'score' => $score,
        'count' => $count,
    ];
    // created $_SESSION
    $_SESSION['user'] = $user;

    // Nettoyer et échapper la valeur
    $pseudo = $db->quote($pseudo);
    // ask database if pseudo is in it
    $sql = "SELECT pseudo FROM user WHERE pseudo = $pseudo";
    $request = $db->query($sql);
    $pseudoCurrent = $request->fetchColumn();
    // if he's not in
    if ($pseudoCurrent === false) {
        // init score elsif error

        $score = 0;
        $pseudo = $_SESSION['user']['pseudo'];
        // insert in $bd
        $sqlInsert = "INSERT INTO user (pseudo, score) VALUES (:pseudo, :score)";
        $createUser = $db->prepare($sqlInsert);
        $createUser->execute(
            [
                'pseudo' => $pseudo,
                'score' => $score
            ]
        );      
    } else {

        $sql = "SELECT score FROM user WHERE pseudo = $pseudo";
        $request = $db->query($sql);
        $score = $request->fetchColumn();
        $_SESSION['user']['score'] = $score;
    }   
}
 header('Location: ../page/start.php');