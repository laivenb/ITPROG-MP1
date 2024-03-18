<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

  <style>
    body {
      background-color: #ddcdc0; 
    }

    .menu-items {
      text-align: center;
    }

    .menu-item {
      display: inline-block;
      margin: 0 20px; 
      vertical-align: top; 
      border: 2px solid #5c5c5c; 
      padding: 10px; 
      background-color: #d39d56;
      width: 300px; 
    }

    .menu-item img {
      max-width: 100%; 
      max-height: 200px; 
      display: block;
      margin: 0 auto; 
    }

    h2 {
      text-align: center; 
    }

    .navigation {
      display: flex; 
      margin-top: 100px;
      justify-content: flex-end; 
      padding-right: 20px; 
    }

    .navigation a {
      display: inline-block;
      padding: 10px 20px;
      margin: 10px;
      border: 2px solid ##944e30;
      background-color: #944e30;
      text-decoration: none;
      color: #d39d56;
      transition: background-color 0.3s, color 0.3s;
    }

    .navigation a:hover {
        color: #ffffff;
    }

    /* Notification Styles */
    .notification {
      position: fixed;
      top: 20px; /* Adjust this value to position it from the top */
      left: 50%;
      transform: translateX(-50%);
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      display: none;
    }
    </style>
<body>
  <!-- Navigation Bar Start-->
  <div class="navBar">
    <img class="logo" id="logo" src="./assets/images/SkyCuisineLogo.png"/>
    <ul>
      <li><a href="#">HOME</a></li>
      <li><a href="#">MENU</a>
        <div class="navDropdown">
          <ul class="navBarDrop">
            <li><a href="#">MAIN</a></li>
            <li><a href="#">SIDES</a></li>
            <li><a href="#">DRINKS</a></li>
            <li><a href="#">COMBO</a></li>
          </ul>
        </div>
      </li>
      <li><a href="#">CART</a></li>
      <li><a href="login.php">LOGIN</a></li>
    </ul>
  </div>
  <!-- Navigation Bar End-->

  <main>
    <h2>SIDE DISHES</h2>
    <section class="menu-items">
      <article class="menu-item">
        <img src="assets/images/fruit_cocktail.jpg" alt="Fruit Cocktail"> 
        <p>Fruit Cocktail</p>
        <p>&#8369;180</p>
        <button onclick="addToCart('Fruit Cocktail', 180)">Add to Cart</button>
      </article>
      <article class="menu-item">
        <img src="assets/images/mashed_potato.jpg" alt="Mashed Potato">
        <p>Mashed Potato</p>
        <p>&#8369;150</p>
        <button onclick="addToCart('Mashed Potato', 150)">Add to Cart</button>
      </article>
      <article class="menu-item">
        <img src="assets/images/mac_n_cheese.jpg" alt="Mac n' Cheese">
        <p>Mac n' Cheese</p>
        <p>&#8369;175</p>
        <button onclick="addToCart('Mac n\' Cheese', 175)">Add to Cart</button>
      </article>
    </section>

    <div class="navigation">
      <a href="drinks.php" class="next-btn">NEXT</a>
      <a href="main.php" class="back-btn">BACK</a>
    </div>

    <!-- Notification Element -->
    <div class="notification" id="notification">Dish Added to Cart</div>

  </main>

  <script>
    // Function to add item to cart and display notification
    function addToCart(itemName, price) {
      // Display the notification
      var notification = document.getElementById("notification");
      notification.style.display = "block";
      setTimeout(function(){
        notification.style.display = "none";
      }, 3000); // Hide notification after 3 seconds
    }
  </script>
</body>
</html>
