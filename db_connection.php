<?php
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = "";
$dbname = "airline_meal";

// Create connection
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Display success message if connection is established
echo "Connected successfully";
?>
