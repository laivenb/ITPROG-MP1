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
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <!-- Display Container Start -->
  <div class="displayContainer">
      <h1 class="dishHeader">Main Dishes</h1>
      <!-- Dish Container Start -->
      <div class="dishContainers" id="dish">
          <!-- First Dish Start -->
          <div class="dishItem">
              <img src="assets/images/carbonara.jpg" alt="">
              <p class="dishName">Carbonara</p>
              <p class="dishPrice">₱350.00</p>
          </div>
           <!-- First Dish End -->
          <!-- Second Dish Start -->
          <div class="dishItem">
              <img src="assets/images/chicken_adobo.jpg" alt="">
              <p class="dishName">Chicken Adobo</p>
              <p class="dishPrice">₱350.00</p>
          </div>
          <!-- Second Dish End -->
          <!-- Third Dish Start -->
          <div class="dishItem">
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
          <span class="close">&times;</span>
          <p>Do you want to add this item to your cart?</p>
          <form method="post" action="add_to_cart.php">
              <input type="hidden" name="item_id" value="1"> <!-- Use PHP to set the item ID -->
              <button type="submit" name="add_to_cart">Add to Cart</button>
          </form>
      </div>
  </div>
</body>

    <script>
        // Modal Function Start
        var addCartModal = document.getElementById("addCartModal");

        var dishItem = document.getElementById("dish");

        var span = document.getElementsByClassName("close")[0];

        dishItem.onclick = function() {
            addCartModal.style.display = "block";
        }

        span.onclick = function() {
            addCartModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == addCartModal) {
                addCartModal.style.display = "none";
            }
        }
        // Modal Function End
    </script>
</html>