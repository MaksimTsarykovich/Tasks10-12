<?php

use JetBrains\PhpStorm\NoReturn;

session_start();

function redirectToHome()
{
    header('location: /Task/guess_number_game/index.php');
    exit();
}

$_SESSION['guessNumber'] = $_POST['guessNumber'];

if (empty($_SESSION['secretNumber'])) {
    $_SESSION['secretNumber'] = rand(1, 20);
}

if(!isset($_SESSION['attempts'])){
    $_SESSION['attempts'] = 10;
}


if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    redirectToHome();
    exit();
}

if (!is_numeric($_SESSION['guessNumber'])|| $_SESSION['guessNumber'] < 0 || $_SESSION['guessNumber'] > 20) {
    $_SESSION['error'] = "Введите число от 0 до 20!";
    redirectToHome();
    exit();
}

if ($_SESSION['guessNumber'] > $_SESSION['secretNumber']) {
    $_SESSION['message'] = "Загаданное число меньше";
} elseif ($_SESSION['guessNumber'] < $_SESSION['secretNumber']) {
    $_SESSION['message'] = "Загаданное число больше";
} else {
    $_SESSION['success'] = "Вы выйграли! Загаданное число " . $_SESSION['secretNumber'];
    unset($_SESSION['secretNumber']);
    session_unset();
    session_destroy();
    redirectToHome();
    exit();
}

$_SESSION['attempts']--;

if ($_SESSION['attempts'] <= 0 ) {
    $_SESSION['error'] = "У вас закончились попытки. Игра окончена!Загаданное число: ".$_SESSION['secretNumber'];
    redirectToHome();
    exit();
}

redirectToHome();






