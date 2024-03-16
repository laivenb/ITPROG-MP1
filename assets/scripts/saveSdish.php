<?php
require_once 'dbh.inc.php';

$pdo = $GLOBALS['pdo'];
$dishName = $_POST['Sname'];
$dishPrice = $_POST['Sprice'];

$sqlCount = "SELECT MAX(side_ID) AS last_side_ID FROM sidedish";
$result = $pdo->query($sqlCount);
$row = $result->fetch(PDO::FETCH_ASSOC);
$lastSideID = $row['last_side_ID'];

$sideID = $lastSideID + 1;

$sqlQuery = "INSERT INTO sidedish (side_ID, side_name, price) VALUES ('$sideID', '$dishName', '$dishPrice')";

$pdo->query($sqlQuery);
header('Location: http://localhost/ITPROG-MP1/adminItem_Manager.php');
?>
