<?php
require_once 'dbh.inc.php';

$pdo = $GLOBALS['pdo'];
$dishName = $_POST['Mname'];
$dishPrice = $_POST['Mprice'];

$sqlCount = "SELECT MAX(dish_ID) AS last_dish_ID FROM maindish";
$result = $pdo->query($sqlCount);
$row = $result->fetch(PDO::FETCH_ASSOC);
$lastDishID = $row['last_dish_ID'];

$dishID = $lastDishID + 1;

$sqlQuery = "INSERT INTO maindish (dish_ID, dish_name, price) VALUES ('$dishID', '$dishName', '$dishPrice')";

$pdo->query($sqlQuery);
header('Location: http://localhost/ITPROG-MP1/adminItem_Manager.php');