<?php

require_once('../connexion/connect.php');
include_once('../partials/header.php');
include_once('../partials/footer.php');

include_once('../process/start-process.php')

?>
<section class="text-center">
    <h1>Question</h1>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium repudiandae eligendi, temporibus inventore enim assumenda nulla qui.</p>
    <div class="text-center">
        <form action="../process/question-process.php" method="post">

            <button type="submit" name="response1">response</button>
            <button type="submit" name="response2">response</button>
            <button type="submit" name="response3">response</button>

        </form>

    </div>

    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 50%"></div>
    </div>
    <section>
        <h2 class="text-center">TOP</h2>
        <div class="text-start mx-4">
            
            <p>top 1</p>
            <p>top 2</p>
            <p>top 3</p>
        </div>

    </section>
</section>