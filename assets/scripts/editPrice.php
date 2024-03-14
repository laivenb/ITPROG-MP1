<?php
// Include your database connection file
include 'dbh.inc.php';

// Check if the dish name is provided in the POST request
if (isset($_POST['dishName'])) {
    // Sanitize the input to prevent SQL injection
    $dish_name = htmlspecialchars($_POST['dishName']);

    // Output the dish name to the browser console
    echo '<script>console.log("Dish Name: ' . $dish_name . '");</script>';

    $pdo = $GLOBALS['pdo'];
    // Prepare a statement to select the dish_ID based on the dish name
    $stmt = $pdo->prepare("SELECT dish_ID FROM dishes WHERE dish_name = :dishName");

    // Bind parameters
    $stmt->bindParam(':dishName', $dish_name);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Dish found, get the dish_ID
        $dish_ID = $row['dish_ID'];

        // Prepare a statement to update the price for the specified dish_ID
        $updateStmt = $pdo->prepare("UPDATE dishes SET dish_price = 9999 WHERE dish_ID = :dish_ID");

        // Bind parameters
        $updateStmt->bindParam(':dish_ID', $dish_ID);

        // Execute the update statement
        if ($updateStmt->execute()) {
            // Return a success message
            echo json_encode(['message' => 'Price updated successfully']);
        } else {
            // Return an error message
            echo json_encode(['message' => 'Failed to update price']);
        }
    } else {
        // Dish not found
        echo json_encode(['message' => 'Dish not found']);
    }
} else {
    // Return an error message if dish_name is not provided
    echo json_encode(['message' => 'Missing dish_name']);
}
?>