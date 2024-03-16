<?php
include 'dbh.inc.php';

if (isset($_POST['dishName'])) {
    $combo_name = htmlspecialchars($_POST['dishName']);

    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT combo_ID FROM combo WHERE combo_Name = :comboName");

    $stmt->bindParam(':comboName', $combo_name);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $combo_ID = $row['combo_ID'];

        $updateStmt = $pdo->prepare("UPDATE combo SET price = 9999 WHERE combo_ID = :combo_ID");

        $updateStmt->bindParam(':combo_ID', $combo_ID);

        if ($updateStmt->execute()) {
            echo json_encode(['message' => 'Price updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update price']);
        }
    } else {
        echo json_encode(['message' => 'Combo not found']);
    }
} else {
    echo json_encode(['message' => 'Missing combo_name']);
}
?>
