<?php

session_start();
print_r($_SESSION['user']);
// recuperation tableau pour score page index
$sql = "SELECT pseudo, score FROM user ORDER BY score DESC LIMIT 10";
$request = $db->query($sql);
$chartTopTens = $request->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #e2e2e2;">

  <header>

    <nav style="background-color: #011936" class="navbar fixed-top">
      <div class="container-md">
        <a class="navbar-brand fs-1 text-light" href="#">QUIZZ</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" style="background-color: #011936" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">USERS</h5>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body text-light">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

              <?php
              foreach ($chartTopTens as $chartTopTen) {
                $addpseudo = $chartTopTen['pseudo'];
                $addscore = $addScore = $chartTopTen['score'];
              ?>
                <li class="nav-item">
                  <?php echo $addpseudo, ' ', $addScore ?>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <?php
