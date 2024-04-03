<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

$_SESSION['cartItems'] = json_encode($data['cartItems']);

echo 'Cart items updated successfully';
?>
