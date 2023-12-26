<?php
require_once('../connexion/connect.php');
include_once('../partials/header.php');
include_once('../partials/footer.php');
include_once('../process/start-process.php');
?>

<section class="text-center">
    <h1>Question</h1>


    <p><?php echo $questions[1] ?></p>
    <div class="text-center">
        <!-- il envoie a response-process qui va compter le score et renvoie a question-process pour regene question-->
        <form action="../process/response-process.php" method="post">

            <button type="submit" name="responseuser" value="<?php echo $resultEchoRandom[0]; ?>"><?php echo $resultEchoRandom[0]; ?></button>
            <button type="submit" name="responseuser" value="<?php echo $resultEchoRandom[1]; ?>"><?php echo $resultEchoRandom[1]; ?></button>
            <button type="submit" name="responseuser" value="<?php echo $resultEchoRandom[2]; ?>"><?php echo $resultEchoRandom[2]; ?></button>

        </form>

    </div>

    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 50%"></div>
    </div>
    <section>
        <h2 class="text-center">TOP</h2>
        <div class="text-start mx-4">
            <p><?php echo $_SESSION['user']['score'] ?></p>

            <p>top 1 <?php echo $_SESSION['user']['pseudo'];echo $_SESSION['user']['score'] ?> </p>
            <p>top 2</p>
            <p>top 3</p>
        </div>

    </section>
</section>

