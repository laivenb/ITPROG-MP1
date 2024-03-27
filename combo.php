<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Combo</title>
  <link rel="stylesheet" href="assets/styles/combo.css">
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">

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