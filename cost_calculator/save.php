<?php
session_start();
require_once(__DIR__ . '/config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    if (empty($name)|| empty($amount)){
        $_SESSION['error'] = "Fields cannot be empty";
        header('Location: /Task');
        exit;
    }
}

$sql = "INSERT INTO expenses (name, amount) VALUES ('{$name}', '{$amount}')";

if (mysqli_query(mysqli_connect("localhost", "root", "", "task"), $sql)) {
    $_SESSION['success'] = " Expense has been added";
} else {
    $_SESSION['error'] = "Error: " . mysqli_error(mysqli_connect("localhost", "root", "", "task"));
}

header('Location: /Task/cost_calculator/10. cost_calculator.php');
