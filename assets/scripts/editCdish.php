<?php
include 'dbh.inc.php';

$combo_name = $_POST['dishName'];
$new_price = $_POST['newPrice'];

$combo_name = htmlspecialchars($combo_name);
$new_price = htmlspecialchars($new_price);

if (!is_numeric($new_price)) {
    echo 'New price must be a valid number';
    exit;
}

$pdo = $GLOBALS['pdo'];
$stmt = $pdo->prepare("UPDATE combo SET price = :newPrice WHERE combo_Name = :comboName");

$stmt->bindParam(':newPrice', $new_price);
$stmt->bindParam(':comboName', $combo_name);

if ($stmt->execute()) {
    echo 'Price updated successfully';
    echo "<script>window.location.href = 'http://localhost/ITPROG-MP1/adminItem_Manager.php';</script>";
} else {
    echo 'Failed to update price';
    // Add debugging for the SQL error, if any
    $errorInfo = $stmt->errorInfo();
    echo "<pre>" . print_r($errorInfo, true) . "</pre>";
}
?>
