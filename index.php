<?php

require_once('./connexion/connect.php');
include_once('./partials/header.php');
include_once('./partials/footer.php');
?>

<section class="vh-100 d-flex">
  <div class="container-md d-flex justify-content-center align-items-center" id="user_create-card">
    <div class="card" style="width: 20rem; background-color: #465362 ">
      <div class="card-body d-flex flex-column ">
        <h5 class="card-title text-light text-center mb-5">CREATE AN ACCOUNT</h5>
        <label for="pseudo" class="text-light mb-1">Pseudo :</label>

        <div class="input d-flex flex-column align-items-center w-100">
          <form action="./process/create-user-process.php" method="post">
            <input type="text" name="pseudo" id="pseudo" class="rounded border-1 mb-4 w-100 text-light" style="background-color: #242424">
            <!-- <a href="#" class="btn text-light w-50 mb-5 rounded-pill" style="background-color:#011936">CREATE</a> -->
            <!-- <input type="button" value=""> -->
            <button type="submit" class="button-create">CREATE</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</section>
