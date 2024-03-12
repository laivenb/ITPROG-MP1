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
      width: 300px; /* Set a fixed width for menu items */
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
  <!-- Required Elements per Page Start -->
      <?php include 'header.php'; ?>                               <!-- Header .php -->
      <?php include './assets/scripts/frameworkLib.php'; ?>        <!-- Framework PHP Script Reference-->
  <!-- Required Elements per Page End -->

  <main>
  <br><br>
    <h2>MAIN DISHES</h2>
    <br>
    <section class="menu-items">
      <article class="menu-item">
        <img src="assets/images/carbonara.jpg" alt="Carbonara"> <br>
        <p>Carbonara</p>
        <p>&#8369;350</p>
      </article>
      <article class="menu-item">
        <img src="assets/images/chicken_adobo.jpg" alt="Chicken Adobo"><br>
        <p>Chicken Adobo</p>
        <p>&#8369;350</p>
      </article>
      <article class="menu-item">
        <img src="assets/images/salmon_steak.jpg" alt="Salmon Steak"><br>
        <p>Salmon Steak</p>
        <p>&#8369;400</p>
      </article>
    </section>

    <div class="navigation">
      <a href="#" class="next-btn">NEXT</a>
      <a href="#" class="cancel-btn">CANCEL</a>
    </div>
  </main>
</body>
</html>