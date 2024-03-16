<?php
include 'dbh.inc.php';

if (isset($_POST['dishName'])) {
    $side_name = htmlspecialchars($_POST['dishName']);

    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT side_ID FROM sidedish WHERE side_name = :sideName");

    $stmt->bindParam(':sideName', $side_name);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $side_ID = $row['side_ID'];

        $updateStmt = $pdo->prepare("UPDATE sidedish SET price = 9999 WHERE side_ID = :side_ID");

        $updateStmt->bindParam(':side_ID', $side_ID);

        if ($updateStmt->execute()) {
            echo json_encode(['message' => 'Price updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update price']);
        }
    } else {
        echo json_encode(['message' => 'Side not found']);
    }
} else {
    echo json_encode(['message' => 'Missing side_name']);
}
?>
