<?php
require_once 'dbh.inc.php';

$pdo = $GLOBALS['pdo'];
$dishName = $_POST['Dname'];
$dishPrice = $_POST['Dprice'];

$sqlCount = "SELECT MAX(drink_ID) AS last_drink_ID FROM drink";
$result = $pdo->query($sqlCount);
$row = $result->fetch(PDO::FETCH_ASSOC);
$lastDrinkID = $row['last_drink_ID'];

$drinkID = $lastDrinkID + 1;

$sqlQuery = "INSERT INTO drink (drink_ID, drink_name, price) VALUES ('$drinkID', '$dishName', '$dishPrice')";

$pdo->query($sqlQuery);
header('Location: http://localhost/ITPROG-MP1/adminItem_Manager.php');
?>
