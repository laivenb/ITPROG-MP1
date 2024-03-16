<?php
include 'dbh.inc.php';

if (isset($_POST['dishName'])) {
    $dish_name = htmlspecialchars($_POST['dishName']);

    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT dish_ID FROM maindish WHERE dish_name = :dishName");

    $stmt->bindParam(':dishName', $dish_name);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $dish_ID = $row['dish_ID'];

        $updateStmt = $pdo->prepare("UPDATE maindish SET price = 9999 WHERE dish_ID = :dish_ID");

        $updateStmt->bindParam(':dish_ID', $dish_ID);

        if ($updateStmt->execute()) {
            echo json_encode(['message' => 'Price updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update price']);
        }
    } else {
        echo json_encode(['message' => 'Dish not found']);
    }
} else {
    echo json_encode(['message' => 'Missing dish_name']);
}
?>