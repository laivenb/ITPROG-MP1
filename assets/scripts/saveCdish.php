<?php
require_once 'dbh.inc.php';

$pdo = $GLOBALS['pdo'];
$dishName = $_POST['Cname'];
$dishPrice = $_POST['Cprice'];

$sqlCount = "SELECT MAX(combo_ID) AS last_combo_ID FROM combo";
$result = $pdo->query($sqlCount);
$row = $result->fetch(PDO::FETCH_ASSOC);
$lastComboID = $row['last_combo_ID'];

$comboID = $lastComboID + 1;

$sqlQuery = "INSERT INTO combo (combo_ID, combo_Name, price) VALUES ('$comboID', '$dishName', '$dishPrice')";

$pdo->query($sqlQuery);
header('Location: http://localhost/ITPROG-MP1/adminItem_Manager.php');
?>
