<?php
session_start();
require_once('config.php');

if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
    $_SESSION['error'] = "Неверный HTTP метод";
    header("Location: /Task/11file/index.php");
    exit;
}

if (!(empty($_FILES["file"]["size"]))) {
    $upLoadDir = __DIR__ . '/uploads/';
    $upLoadFile = $upLoadDir . basename($_FILES["file"]['name']);
} else {
    $_SESSION['error'] = "Выберете изображение";
    header("Location: /Task/11file/index.php");
    exit;
}

if (!($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png")) {
    $_SESSION['error'] = "Можно загрузить изображение только в формате .jpg и .png";
    header("Location: /Task/11file/index.php");
    exit;
}

if (move_uploaded_file($_FILES["file"]["tmp_name"], $upLoadFile)) {
    $_SESSION['success'] = "Изображение успешно загружено";
    $sql = "INSERT INTO `images` (`id`, `filename`) VALUES (NULL, '{$_FILES["file"]['name']}')";
    mysqli_query($mysqli, $sql);
    header("Location: /Task/11file/index.php");
    exit;
}


