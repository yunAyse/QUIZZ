<?php
require_once('../connexion/connect.php');
include_once('../partials/header.php');
include_once('../partials/footer.php');
include_once('../process/start-process.php');
include_once('../process/response-process.php');

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
<div class="container">
    <div class="d-flex align-items-center justify-content-center ">


        <section class="text-center mt-5 mb-5 h-50">
            <h1 class=" pt-5">Question</h1>

            <p><?php echo $questions[1] ?></p>
            <div class="text-center mt-4">
                <!-- il envoie a response-process qui va compter le score et renvoie a question-process pour regenerer la question-->
                <form action="../process/response-process.php" method="post">
                    <button type="submit" name="responseuser" value="<?php echo $resultEchoRandom[0]; ?>"><?php echo $resultEchoRandom[0]; ?></button>
                    <button type="submit" name="responseuser" value="<?php echo $resultEchoRandom[1]; ?>"><?php echo $resultEchoRandom[1]; ?></button>
                    <button type="submit" name="responseuser" value="<?php echo $resultEchoRandom[2]; ?>"><?php echo $resultEchoRandom[2]; ?></button>
                </form>
            </div>


            <!-- Affichage du chronomètre -->
            <div class="mt-5">Temps restant : <span id="countdown"><?php echo $formattedTime; ?></span></div>
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