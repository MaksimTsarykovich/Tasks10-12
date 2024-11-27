<?php
$mysqli = mysqli_connect("localhost", "root", "", "task");

if (!$mysqli) {
    $_SESSION['error'] = "Cannot connect to database. Error: " . mysqli_connect_error();
}
