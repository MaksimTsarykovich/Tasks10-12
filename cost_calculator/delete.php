<?php
session_start();

$id = (int) $_GET['id'];
echo $id;


$sql = "DELETE FROM expenses WHERE `expenses`.`id` = $id";
if (mysqli_query(mysqli_connect("localhost", "root", "", "task"), $sql)){
    $_SESSION['success'] = " Expense has been deleted successfully";
}else {
    $_SESSION['error'] = "Error: " . mysqli_error(mysqli_connect("localhost", "root", "", "task"));
}

header('Location: /Task/cost_calculator/10. cost_calculator.php');