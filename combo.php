<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Combo</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ddcdc0; /* Set your desired background color */
    }

    .combo-items {
      text-align: center;
    }

    .combo-item {
      display: inline-block;
      margin: 0 20px; /* Adjust the spacing between menu items */
      vertical-align: top; /* Align items at the top */
      border: 2px solid #5c5c5c; /* Add border */
      padding: 10px; /* Add padding */
      background-color: #d39d56;
      width: 300px; /* Set a fixed width for menu items */
    }

    .combo-item img {
      max-width: 100%; /* Ensure images are not wider than their container */
      max-height: 200px; /* Set a maximum height for consistency */
      display: block;
      margin: 0 auto; /* Centers the images horizontally */
    }

    h2 {
        font-family: 'IntroRust-Base', sans-serif;
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

    .introrustbase-font {
        font-family: 'IntroRust-Base', sans-serif; /* Apply Intro Rust Base font to this specific element */
}
  </style>
</head>
<body>
  <!-- Required Elements per Page Start -->
      <?php include 'header.php'; ?>                               <!-- Header .php -->
      <?php include './assets/scripts/frameworkLib.php'; ?>        <!-- Framework PHP Script Reference-->
  <!-- Required Elements per Page End -->

  <main>
  <br><br>
    <h2 class = "introrustbase-font">COMBO MEALS</h2>
    <br>
    <section class="combo-items">

      <article class="combo-item">
        <img src="assets/images/combo1.jpg" alt="Combo 1"><br>
        <p>Chicken Adobo + Mac n' Cheese + Orange Juice</p>
        <p>&#8369;540 (save 10%!)</p>
      </article>
      <article class="combo-item">
        <img src="assets/images/combo2.jpg" alt="Combo 2"><br>
        <p>Salmon Steak + Fruit Cocktail + Coffee</p>
        <p>&#8369;663 (save 15%!)</p>
      </article>
    </section>

    <div class="navigation">
      <a href="#" class="next-btn">NEXT</a>
      <a href="#" class="cancel-btn">CANCEL</a>
    </div>
  </main>
</body>
</html>