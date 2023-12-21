<?php
require('../connexion/connect.php');
include_once('../partials/header.php');
include_once('../partials/footer.php');

?>

<!-- le bouton va générer le start process. -->
<section class="vh-100 d-flex">
  <div class="container-md d-flex align-items-center justify-content-center">
    <form action="../process/start-process.php" class="">
      <button type="submit" class="rounded-pill border-1 mb-4 p-2 px-4 text-light" style="background-color: #242424">START</button>
    </form>
  </div>
</section>