<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ddcdc0; /* Set your desired background color */
    }

    .menu-items {
      text-align: center;
    }

    .menu-item {
      display: inline-block;
      margin: 0 20px; /* Adjust the spacing between menu items */
      vertical-align: top; /* Align items at the top */
      border: 2px solid #5c5c5c; /* Add border */
      padding: 10px; /* Add padding */
      background-color: #d39d56;
    }

    .menu-item img {
     max-width: 100%; /* Ensure images are not wider than their container */
      max-height: 200px; /* Set a maximum height for consistency */
      display: block;
      margin: 0 auto; /* Centers the images horizontally */
    }

    h2 {
      text-align: center; /* Center the "MAIN DISHES" heading */
    }

    .navigation {
      display: flex; /* Use flexbox layout */
      margin-top: 100px;
      justify-content: flex-end; /* Align items to the right */
      padding-right: 20px; /* Add some padding to the right */
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
  </style>
</head>
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
      </article>
      <article class="menu-item">
        <img src="assets/images/mashed_potato.jpg" alt="Mashed Potato">
        <p>Mashed Potato</p>
        <p>&#8369;150</p>
      </article>
      <article class="menu-item">
        <img src="assets/images/mac_n_cheese.jpg" alt="Mac n' Cheese">
        <p>Mac n' Cheese</p>
        <p>&#8369;175</p>
      </article>
    </section>

    <div class="navigation">
      <a href="#" class="next-btn">NEXT</a>
      <a href="#" class="cancel-btn">CANCEL</a>
    </div>
  </main>
</body>
</html>
