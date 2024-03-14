<?php
$dsn = "mysql:host=localhost;dbname=airline_meal";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$GLOBALS['pdo'] = $pdo;