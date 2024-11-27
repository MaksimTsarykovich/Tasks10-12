<?php
require_once(__DIR__ . '/config.php');

function getProducts($mysqli)
{
    $sql = 'SELECT * FROM `expenses` ';
    $result = mysqli_query($mysqli, $sql);
    return $result;
}

function getTotalCost($mysqli){
    $totalCost = 0;
    $sql = 'SELECT * FROM `expenses` ';
    $result = mysqli_query($mysqli, $sql);
    foreach($result as $row){
        $totalCost = $totalCost + $row['amount'];
    }
    return $totalCost;
}