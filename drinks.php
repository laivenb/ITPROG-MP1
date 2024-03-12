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
    <h2>DRINKS</h2>
    <section class="menu-items">
      <article class="menu-item">
        <img src="assets/images/orange_juice.jpg" alt="Orange Juice"> 
        <p>Orange Juice</p>
        <p>&#8369;100</p>
      </article>
      <article class="menu-item">
        <img src="assets/images/cola_can.jpg" alt="Cola">
        <p>Mashed Potato</p>
        <p>&#8369;100</p>
      </article>
      <article class="menu-item">
        <img src="assets/images/coffee.jpg" alt="Coffee">
        <p>Coffee [Hot/Cold]</p>
        <p>&#8369;200</p>
      </article>
    </section>

    <div class="navigation">
      <a href="#" class="next-btn">NEXT</a>
      <a href="#" class="cancel-btn">CANCEL</a>
    </div>
  </main>
</body>
</html>
