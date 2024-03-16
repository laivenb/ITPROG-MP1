<?php
include 'dbh.inc.php';

$side_name = $_POST['dishName'];
$new_price = $_POST['newPrice'];

$side_name = htmlspecialchars($side_name);
$new_price = htmlspecialchars($new_price);

if (!is_numeric($new_price)) {
    echo 'New price must be a valid number';
    exit;
}

$pdo = $GLOBALS['pdo'];
$stmt = $pdo->prepare("SELECT side_ID FROM sidedish WHERE side_name = :sideName");

$stmt->bindParam(':sideName', $side_name);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $side_ID = $row['side_ID'];

    $updateStmt = $pdo->prepare("UPDATE sidedish SET price = :newPrice WHERE side_ID = :side_ID");

    $updateStmt->bindParam(':newPrice', $new_price);
    $updateStmt->bindParam(':side_ID', $side_ID);

    if ($updateStmt->execute()) {
        echo 'Price updated successfully';
        echo "<script>window.location.href = 'http://localhost/ITPROG-MP1/adminItem_Manager.php';</script>";
    } else {
        echo 'Failed to update price';
    }
} else {
    echo 'Dish not found';
}
?>
