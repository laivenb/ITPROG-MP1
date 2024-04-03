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
<!-- Get Dishes Script Start-->
<?php
include_once './assets/scripts/dbh.inc.php';

function getAllMainDishes()
{
    try {
        $pdo = $GLOBALS['pdo'];

        if (!$pdo) {
            throw new PDOException('Failed to connect to the database.');
        }

        $sql = "SELECT drink_ID, drink_name, price FROM drink";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            throw new PDOException('Failed to prepare the SQL statement.');
        }

        $stmt->execute();
        $drinks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;

        return $drinks;
    } catch (PDOException $e) {
        return array('error' => $e->getMessage());
    }
}

$drinks = getAllMainDishes();
?>
<!-- Get Dishes Script End-->

<!-- Display Container Start -->
<div class="displayContainer">
    <h1 class="dishHeader">Drinks</h1>
    <!-- Dish Container Start -->
    <div class="dishContainers" id="dish">
        <?php foreach ($drinks as $dish):
            if ($dish['price'] != 9999) {    ?>
            <div class="dishItem" onclick="showAddToCartModal('<?php echo $dish['drink_name']; ?>', '₱<?php echo $dish['price']; ?>', <?php echo $dish['drink_ID']; ?>, 'drink<?php echo $dish['drink_ID']; ?>.jpg')">
                <img src="assets/images/drink<?php echo $dish['drink_ID']; ?>.jpg" alt="">
                <p class="dishName"><?php echo $dish['drink_name']; ?></p>
                <p class="dishPrice">₱<?php echo $dish['price']; ?></p>
            </div>
            <?php }
         endforeach; ?>
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