<?php
include 'dbh.inc.php';

$dish_name = $_POST['dishName'];
$new_price = $_POST['newPrice'];

$dish_name = htmlspecialchars($dish_name);
$new_price = htmlspecialchars($new_price);

if (!is_numeric($new_price)) {
    echo 'New price must be a valid number';
    exit;
}

$pdo = $GLOBALS['pdo'];
$stmt = $pdo->prepare("SELECT dish_ID FROM maindish WHERE dish_name = :dishName");

$stmt->bindParam(':dishName', $dish_name);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $dish_ID = $row['dish_ID'];

    $updateStmt = $pdo->prepare("UPDATE maindish SET price = :newPrice WHERE dish_ID = :dish_ID");

    $updateStmt->bindParam(':newPrice', $new_price);
    $updateStmt->bindParam(':dish_ID', $dish_ID);

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
