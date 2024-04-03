<?php
require_once 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : 0;


    $sql = "INSERT INTO `transaction` (`transaction_ID`, `order_ID`, `total_price`, `transaction_date`) 
            VALUES (NULL, NULL, $totalPrice, NOW())";


    if (mysqli_query($conn, $sql)) {
        echo "New transaction created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Form was not submitted.";
}
?>
