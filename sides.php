<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sides</title>
  <link rel="stylesheet" href="assets/styles/sides.css">
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
