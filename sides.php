<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sides</title>
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
    <h1 class="dishHeader">Side Dishes</h1>
    <!-- Dish Container Start -->
    <div class="dishContainers">
        <!-- First Dish Start -->
        <div class="dishItem">
            <img src="assets/images/fruit_cocktail.jpg" alt="">
            <p class="dishName">Fruit Cocktail</p>
            <p class="dishPrice">₱180.00</p>
        </div>
        <!-- First Dish End -->
        <!-- Second Dish Start -->
        <div class="dishItem">
            <img src="assets/images/mashed_potato.jpg" alt="">
            <p class="dishName">Mashed Potato</p>
            <p class="dishPrice">₱150.00</p>
        </div>
        <!-- Second Dish End -->
        <!-- Third Dish Start -->
        <div class="dishItem">
            <img src="assets/images/mac_n_cheese.jpg" alt="">
            <p class="dishName">Mac n' Cheese</p>
            <p class="dishPrice">₱175.00</p>
        </div>
        <!-- Third Dish End -->
    </div>
    <!-- Dish Container End-->
</div>
<!-- Display Container End -->
<img class="cart" src="assets/images/Cart.png" alt="">
</body>
</html>