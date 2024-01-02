<?php
require_once('../connexion/connect.php');
include_once('../partials/header.php');
include_once('../partials/footer.php');
include_once('../process/start-process.php');

$chronometerDuration = 5; // Durée en secondes

// Moment du début du chronomètre
$startTime = time();
$timeRemaining = max(0, $chronometerDuration - (time() - $startTime));
$formattedTime = gmdate("s", $timeRemaining);

//  cookie  défini
if (!isset($_COOKIE['startTime'])) {
    setcookie('startTime', $startTime, time() + $chronometerDuration, '/');
}

?>
<div class="container" style="margin-top: 150px;">
    <div class="d-flex align-items-center justify-content-center " >


        <section class="text-center text-light mt-5 mb-5 h-50 p-5 rounded-4 " style="background-color: #465362">
            <h1 class=" pt-5">Question</h1>

            <p class="fs-4 text-light mt-4" style=" padding: 20px 0 20px 0;"><?php echo $questions[1] ?></p>
            <div class="text-center mt-4 ">
                <!-- il envoie a response-process qui va compter le score et renvoie a question-process pour regenerer la question-->
                <form action="../process/response-process.php" method="post" id="responseForm">
                    <button class="rounded-pill border-0 mb-4 py-2 w-75 text-light fs-5" style="background-color: #242424" type="submit" name="responseuser" id="response" value="<?php echo $resultEchoRandom[0]; ?>"><?php echo $resultEchoRandom[0]; ?></button>

                    <button class="rounded-pill border-0 mb-4 py-2 w-75 text-light fs-5" style="background-color: #242424" type="submit" name="responseuser" id="response" value="<?php echo $resultEchoRandom[1]; ?>"><?php echo $resultEchoRandom[1]; ?></button>

                    <button class="rounded-pill border-0 mb-4 py-2 w-75 text-light fs-5" style="background-color: #242424" type="submit" name="responseuser" id="response" value="<?php echo $resultEchoRandom[2]; ?>"><?php echo $resultEchoRandom[2]; ?></button>
                </form>
            </div>
            

            <!-- Affichage du chronomètre -->
            <div class="d-flex justify-content-center">
                 <div class="mt-5 p-3 text-light rounded-pill w-25" style="background-color: #82A3A1">
            <span id="countdown" class="text-center fs-3"><?php echo $formattedTime; ?></span></div>
            </div>
           
        </section>
    </div>
</div>

<script>
    // Fonction pour mettre à jour le chronomètre et rediriger après le temps imparti
    function updateCountdown() {
        let countdownElement = document.getElementById('countdown');
        let timeRemaining = parseInt(countdownElement.textContent);

        if (timeRemaining <= 0) {
            // Redirection vers index.php
            window.location.href = '../process/response-process.php';
        } else {
            // Mettre à jour le chronomètre
            countdownElement.textContent = timeRemaining - 1;

            // Mettre à jour le cookie avec le nouveau temps restant
            document.cookie = `startTime=${Math.floor(Date.now() / 1000) - (<?php echo $chronometerDuration; ?> - timeRemaining)}`;

            // Appeler la fonction toutes les secondes
            setTimeout(updateCountdown, 1000);
        }
    }

    // Appeler la fonction pour la première fois
    setTimeout(updateCountdown, 1000);
</script>