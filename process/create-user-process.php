<?php

require_once('../connexion/connect.php');

if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

  $pseudo = $_POST['pseudo'];
  // var_dump($pseudo);
  $score = 0;

  $sql = 'INSERT INTO user (pseudo, score) VALUES (:pseudo, :score)';

  $createUser = $db->prepare($sql);
  $createUser->execute([
    'pseudo' => $pseudo,
    'score' => $score
  ]);

  // je recupere le dernier user crée
  $userId = $db->lastInsertId();

  // je select et join les user id et cherche la valeur de userId 
$questionSql = 'SELECT * FROM user JOIN question ON user.id = question.user_id WHERE user.id = :userId';
$request = $db->prepare($questionSql);
$request->execute([
  // je prend ma variable avec le dernier ID crée precedemment.
  'userId' => $userId
]);

$userStartQuestion = $request->fetchAll();

  // le user est crée et envoie vers la page start.
  header('Location: ../page/start.php');

} else {
  header('Location: ../index.php');
}
?>
