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
        <div class="dishItem" onclick="showAddToCartModal('Orange Juice', '₱100.00', 1, 'orange_juice.jpg')">
            <img src="assets/images/orange_juice.jpg" alt="">
            <p class="dishName">Orange Juice</p>
            <p class="dishPrice">₱100.00</p>
        </div>
        <!-- First Dish End -->
        <!-- Second Dish Start -->
        <div class="dishItem" onclick="showAddToCartModal('Coca-Cola Can', '₱100.00', 1, 'cola_can.jpg')">
            <img src="assets/images/cola_can.jpg" alt="">
            <p class="dishName">Coca-Cola Can</p>
            <p class="dishPrice">₱100.00</p>
        </div>
        <!-- Second Dish End -->
        <!-- Third Dish Start -->
        <div class="dishItem" onclick="showCoffeeOptions('Coffee', '₱200.00', 1, 'coffee.jpg')">
            <img src="assets/images/coffee.jpg" alt="">
            <p class="dishName">Coffee (Hot/Iced)</p>
            <p class="dishPrice">₱200.00</p>
        </div>
        <!-- Third Dish End -->
    </div>
    <!-- Dish Container End-->
</div>
    <!-- Display Container End -->
    <img class="cart" src="assets/images/Cart.png" alt="">

    <!-- Add to Cart Modal Start -->
    <div class="addCartModal" id="addCartModal">
        <div class="modal-content">
            <span class="close" onclick="hideAddToCartModal()">&times;</span>
            <p id="modalDishNameAndPrice"></p>
            <div class="modalImgContainer">
                <img class="modalImg" id="modalItemImg" src="" alt="">
            </div>
            <label for="quantityInput">Quantity:</label>
            <input type="number" class="qtyModal" value="1">
            <form method="post" action="add_to_cart.php">
                <input type="hidden" name="item_id" id="modalItemId">
                <button class="submitBtnModal" type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
    </div>
    <!-- Add to Cart Modal End-->

    <!-- Show Coffee Start -->
        <div class="showCoffeeOptions" id="showCoffeeOptions">
            <div class="modal-content">
                <span class="close" onclick="hideShowCoffeeModal()">&times;</span>
                <p id="modalDishNameAndPriceCoffee"></p>
                <div class="modalImgContainer">
                    <img class="modalImg" id="modalItemImgCoffee" src="" alt="">
                </div>
                <label for="quantityInput">Quantity:</label>
                 <input type="number" class="qtyModal" value="1">
                <select id="coffeeType" name="coffeeType">
                    <option value="hot">Hot</option>
                    <option value="iced">Iced</option>
                </select>
                <form method="post" action="add_to_cart_coffee.php">
                    <input type="hidden" name="item_id" id="modalItemIdCoffee">
                    <button class="submitBtnModal" type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        </div>
    <!-- Show Coffee End-->
    </body>

    <script>
        // Modal Function Start
        var addCartModal = document.getElementById("addCartModal");
        var showCoffeeModal = document.getElementById("showCoffeeOptions")

        function showAddToCartModal(dishName, dishPrice, itemId, imgName) {
            document.getElementById("modalDishNameAndPrice").innerText = dishName + "   " + dishPrice;
            document.getElementById("modalItemId").value = itemId;
            document.getElementById("modalItemImg").setAttribute("src", "assets/images/" + imgName);
            addCartModal.style.display = "block";
        }

        function showCoffeeOptions(dishName, dishPrice, itemId, imgName) {
            document.getElementById("modalDishNameAndPriceCoffee").innerText = dishName + "   " + dishPrice;
            document.getElementById("modalItemIdCoffee").value = itemId;
            document.getElementById("modalItemImgCoffee").setAttribute("src", "assets/images/" + imgName);
            showCoffeeModal.style.display = "block";
        }

        function hideModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == addCartModal || event.target == showCoffeeModal) {
                hideModal('addCartModal');
                hideModal('showCoffeeOptions');
            }
        };
        // Modal Function End

    </script>
</html>