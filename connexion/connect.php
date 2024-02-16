<?php

try {
    $dsn = 'mysql:host=localhost;dbname=tp_quizz';
    $user = 'root';
    $password = '';
    $db = new PDO($dsn, $user, $password);

} catch (Exception $message) {
    echo 'error' . $message;
}
