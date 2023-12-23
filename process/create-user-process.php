<?php

require_once('../connexion/connect.php');

session_start();



if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    $score = 0;
    $count = 1;
    $user = [
        'pseudo' => $_POST['pseudo'],
        'score' => $score,
        'count' => $count
    ];
    $_SESSION['user'] = $user;
    $pseudo = $_POST['pseudo'];
    $pseudo = $db->quote($pseudo); // Nettoyer et échapper la valeur

    $sql = "SELECT score FROM user WHERE pseudo = $pseudo";
    $request = $db->query($sql);
    $score = $request->fetchColumn();

// ----------------------------------------------------------------------------------------
//     // dire que si le pseudo existe je vais a start
// -------------------------------------------------------------------------------------
    if ($score) {
        header('Location: ../page/start.php');

    } else {
        // initiallisation du score sinon erreur
       $score = 0;
        // insertion dans $bd
        $sqlInsert = "INSERT INTO user (pseudo, score) VALUES (:pseudo, :score)";
        $createUser = $db->prepare($sqlInsert);
        $createUser->execute(
            [
                'pseudo' => $_POST['pseudo'],
                'score' => $score
            ]
        );
    }

} else {
    header('Location: ../index.php');
}

// si il y a un score envoi au start.php
header('Location: ../page/start.php');


// var_dump($_POST['pseudo']);
// $resultpseudo = $_POST['pseudo'];



// $_SESSION['pseudo'] = $_POST[''];'$resultpseudo'

//   $userConnect = [
//     'id'=> $db->lastInsertId(),
//     'pseudo'=>$_POST['pseudo'],

// ];
//   $_SESSION['user'] = $userConnect;
//   var_dump($_SESSION['user']['pseudo']) ;
// if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

// }

// --------------------------------------------------------
// if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {


//   $pseudo = $_POST['pseudo'];
//   // var_dump($pseudo);
//   $score = 0;

//   $sql = 'INSERT INTO user (pseudo, score) VALUES (:pseudo, :score)';

//   $createUser = $db->prepare($sql);
//   $createUser->execute([
//     'pseudo' => $pseudo,
//     'score' => $score
//   ]);

//   // je recupere le dernier user crée
//   $userId = $db->lastInsertId();

//   // je select et join les user id et cherche la valeur de userId 
// $questionSql = 'SELECT * FROM user JOIN question ON user.id = question.user_id WHERE user.id = :userId';
// $request = $db->prepare($questionSql);
// $request->execute([
//   // je prend ma variable avec le dernier ID crée precedemment.
//   'userId' => $userId
// ]);

// $userStartQuestion = $request->fetchAll();

//   // le user est crée et envoie vers la page start.
//   header('Location: ../page/start.php');

// } else {
//   header('Location: ../index.php');
// }
