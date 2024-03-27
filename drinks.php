<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks</title>
    <!-- Required Elements per Page Start -->
    <?php include 'header.php'; ?>                               <!-- Header .php -->
    <?php include './assets/scripts/frameworkLib.php'; ?>        <!-- Framework PHP Script Reference-->
    <!-- Required Elements per Page End -->
    <link rel="stylesheet" href="assets/styles/main.css">
    <!-- Import Header Stylesheet -->
    <link rel="stylesheet" href="assets/styles/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<!-- Display Container Start -->
<div class="displayContainer">
    <h1 class="dishHeader">Drinks</h1>
    <!-- Dish Container Start -->
    <div class="dishContainers">
        <!-- First Dish Start -->
        <div class="dishItem">
            <img src="assets/images/orange_juice.jpg" alt="">
            <p class="dishName">Orange Juice</p>
            <p class="dishPrice">₱100.00</p>
        </div>
        <!-- First Dish End -->
        <!-- Second Dish Start -->
        <div class="dishItem">
            <img src="assets/images/cola_can.jpg" alt="">
            <p class="dishName">Coca-Cola Can</p>
            <p class="dishPrice">₱100.00</p>
        </div>
        <!-- Second Dish End -->
        <!-- Third Dish Start -->
        <div class="dishItem">
            <img src="assets/images/coffee.jpg" alt="">
            <p class="dishName">Coffee ( Hot | Iced )</p>
            <p class="dishPrice">₱200.00</p>
        </div>
        <!-- Third Dish End -->
    </div>
    <!-- Dish Container End-->
</div>
<!-- Display Container End -->
<img class="cart" src="assets/images/Cart.png" alt="">
</body>
</html>