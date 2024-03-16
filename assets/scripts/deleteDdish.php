<?php
include 'dbh.inc.php';

if (isset($_POST['dishName'])) {
    $drink_name = htmlspecialchars($_POST['dishName']);

    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT drink_ID FROM drink WHERE drink_name = :drinkName");

    $stmt->bindParam(':drinkName', $drink_name);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $drink_ID = $row['drink_ID'];

        $updateStmt = $pdo->prepare("UPDATE drink SET price = 9999 WHERE drink_ID = :drink_ID");

        $updateStmt->bindParam(':drink_ID', $drink_ID);

        if ($updateStmt->execute()) {
            echo json_encode(['message' => 'Price updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update price']);
        }
    } else {
        echo json_encode(['message' => 'Drink not found']);
    }
} else {
    echo json_encode(['message' => 'Missing drink_name']);
}
?>
