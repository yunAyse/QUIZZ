<?php

require_once('../connexion/connect.php');

if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

  
  $pseudo = $_POST['pseudo'];
  // var_dump($pseudo);

  // je select le score du nouveau user. (qui est 0 pour le moment)
  $scoresql = 'SELECT * FROM user WHERE score';
  $request = $db->query($scoresql);
  $score = $request->fetch();

  $score = $db->lastInsertId();
  
  // var_dump($score);


  $request = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
  $request->bindValue(':pseudo', $pseudo);
  $request->execute();
  $pseudoSelects = $request->fetch();

  // je check avec la condition si un user au meme nom est deja connecté.
  if ($pseudoSelects) {
    $userId = $pseudoSelects['id'];

  } else {
  // si non, j'ajoute le user.
    $sql = 'INSERT INTO user (pseudo, score) VALUES (:pseudo, :score)';
  
    $createUser = $db->prepare($sql);
    $createUser->execute([
      'pseudo' => $pseudo,
      'score' => $score
    ]);

    // je recupere le dernier user crée
    $userId = $db->lastInsertId();
  }



  session_start();

    $_SESSION['user'] = $userId;
    $user = $_SESSION['user'];
    var_dump( $_SESSION['user']);


    if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
      $request = $db->query("SELECT * FROM question WHERE user_id = $user");
      $questionWithUser = $request->fetchAll();
      var_dump($questionWithUser);
    } 
    

  $request = $db->prepare("SELECT * FROM user WHERE id = $userId");
  $request->execute();
  $userQuestion = $request->fetch();
  $userSend[] = $userQuestion['0'];


  



  
  
  
  die();
  
  
  // le user est crée et envoie vers la page start.
  header('Location: ../page/start.php');
  
} else {
  header('Location: ../index.php');
}
?>



  // $userString = implode('  ', $userSend);
  // var_dump($userString);

$request = $db->prepare("SELECT *  FROM question WHERE user_id = 1");
$request->execute();
$startQuestions = $request->fetchAll();


    // foreach($startQuestions as $startQuestion) {
    //   $resultQuestion = $startQuestion;
    //   var_dump($resultQuestion);
    // }

// je select et join les user id et cherche la valeur de userId 
// $questionSql = 'SELECT * FROM user JOIN question ON user.id = question.user_id WHERE user.id = :userId';
// $request = $db->prepare($questionSql);
// $request->execute([
//   // je prend ma variable avec le dernier ID crée precedemment.
//   'userId' => $userId
// ]);

// $userStartQuestion = $request->fetchAll();

// var_dump($userStartQuestion);