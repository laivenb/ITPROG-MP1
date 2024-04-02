<?php
session_start();
$cartItems = isset($_SESSION['cartItems']) ? $_SESSION['cartItems'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <div class="dishItem" onclick="showAddToCartModal('Combo 1', '₱652.00', 1, 'combo1.jpg')">
            <img src="assets/images/combo1.jpg" alt="">
            <p class="dishName">Combo 1</p>
            <p class="dishPrice">₱350.00</p>
        </div>
        <!-- First Dish End -->
        <!-- Second Dish Start -->
        <div class="dishItem" onclick="showAddToCartModal('Combo 2', '₱578.00', 1, 'combo2.jpg')">
            <img src="assets/images/combo2.jpg" alt="">
            <p class="dishName">Combo 2</p>
            <p class="dishPrice">₱350.00</p>
        </div>
        <!-- Second Dish End -->
    </div>
    <!-- Dish Container End-->
</div>
<!-- Display Container End -->
    <button id="cartButton" style="border: none; background: none; cursor: pointer;">
        <img class="cart" src="assets/images/Cart.png" alt="">
    </button>

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
        <form method="post">
            <input type="hidden" name="item_id" id="modalItemId">
            <button class="submitBtnModal" type="submit" name="add_to_cart" onclick="addToCart(event)">Add to Cart</button>
        </form>
    </div>
</div>
    <!-- Add to Cart Modal End-->
    </body>

    <script>
        $(document).ready(function() {
            $('#cartButton').click(function() {
                window.location.href = 'order_summary.php';
            });
        });

        var cartItemsJson = sessionStorage.getItem('cartItems');
        var cartItems = cartItemsJson ? JSON.parse(cartItemsJson) : [];

        function updateCartItemsInSession(cartItems) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './assets/scripts/update_cart_items.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Cart items updated successfully');
                }
            };
            xhr.send(JSON.stringify({ cartItems: cartItems }));
        }

        //Add to Cart Function Start
        function addToCart(event) {
            event.preventDefault();

            var dishNameAndPrice = document.getElementById("modalDishNameAndPrice").textContent;
            var [dishName, dishPrice] = dishNameAndPrice.split(/\s{2,}/);

            var quantityInput = document.getElementById("quantityInput");
            var quantity = quantityInput ? quantityInput.value : 1;

            var imgName = document.getElementById("modalItemImg").getAttribute("src");

            var dishNumber = cartItems.length + 1;

            var item = {
                dishNumber: dishNumber,
                dishName: dishName,
                dishPrice: dishPrice,
                quantity: quantity,
                imgName: imgName,
                discount: null,
                comboBoolean: true
            };

            cartItems.push(item);
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems));

            updateCartItemsInSession(cartItems);

            console.log("Added to cart:", item);

            alert("Dish added to Cart!");
        }

        //Add to Cart Function End

        // Modal Function Start
        var addCartModal = document.getElementById("addCartModal");

        function showAddToCartModal(dishName, dishPrice, itemId, imgName) {
            document.getElementById("modalDishNameAndPrice").innerText = dishName + "   " + dishPrice;
            document.getElementById("modalItemId").value = itemId;
            document.getElementById("modalItemImg").setAttribute("src", "assets/images/" + imgName);
            addCartModal.style.display = "block";
        }

        function hideAddToCartModal() {
            addCartModal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == addCartModal) {
                hideAddToCartModal();
            }
        };
        // Modal Function End
    </script>
</html>