<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
    <!-- Required Elements per Page Start -->
    <?php include 'header.php'; ?>                               <!-- Header .php -->
    <?php include './assets/scripts/frameworkLib.php'; ?>        <!-- Framework PHP Script Reference-->
    <!-- Required Elements per Page End -->
  <link rel="stylesheet" href="assets/styles/main.css">
  <!-- Import Header Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <!-- Display Container Start -->
  <div class="displayContainer">
      <h1 class="dishHeader">Main Dishes</h1>
      <!-- Dish Container Start -->
      <div class="dishContainers" id="dish">
          <!-- First Dish Start -->
          <div class="dishItem" onclick="showAddToCartModal('Carbonara', '₱350.00', 1, 'carbonara.jpg')">
              <img src="assets/images/carbonara.jpg" alt="">
              <p class="dishName">Carbonara</p>
              <p class="dishPrice">₱350.00</p>
          </div>
           <!-- First Dish End -->
          <!-- Second Dish Start -->
          <div class="dishItem" onclick="showAddToCartModal('Chicken Adobo', '₱350.00', 1, 'chicken_adobo.jpg')">
              <img src="assets/images/chicken_adobo.jpg" alt="">
              <p class="dishName">Chicken Adobo</p>
              <p class="dishPrice">₱350.00</p>
          </div>
          <!-- Second Dish End -->
          <!-- Third Dish Start -->
          <div class="dishItem" onclick="showAddToCartModal('Salmon Steak', '₱400.00', 1, 'salmon_steak.jpg')">
              <img src="assets/images/salmon_steak.jpg" alt="">
              <p class="dishName">Salmon Steak</p>
              <p class="dishPrice">₱400.00</p>
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
</body>

    <script>
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