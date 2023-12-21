<?php

require_once('../connexion/connect.php');

if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

  var_dump('hello');
  $pseudo = $_POST['pseudo'];
  $score = 0;

  $sql = 'INSERT INTO user (pseudo, score) VALUES (:pseudo, :score)';

  $createUser = $db->prepare($sql);
  $createUser->execute([
    'pseudo' => $pseudo,
    'score' => $score
  ]);


}
?>
