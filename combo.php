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
    <h1 class="dishHeader">Combo Dishes</h1>
    <!-- Dish Container Start -->
    <div class="dishContainers">
        <!-- First Dish Start -->
        <div class="dishItem">
            <img src="assets/images/combo1.jpg" alt="">
            <p class="dishName">Combo 1</p>
            <p class="dishPrice">₱350.00</p>
        </div>
        <!-- First Dish End -->
        <!-- Second Dish Start -->
        <div class="dishItem">
            <img src="assets/images/combo2.jpg" alt="">
            <p class="dishName">Combo 2</p>
            <p class="dishPrice">₱350.00</p>
        </div>
        <!-- Second Dish End -->
    </div>
    <!-- Dish Container End-->
</div>
<!-- Display Container End -->
<img class="cart" src="assets/images/Cart.png" alt="">
</body>
</html>