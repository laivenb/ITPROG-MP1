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