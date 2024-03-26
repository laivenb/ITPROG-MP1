<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            padding: 20px;
        }
        .cart-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .cart-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item p {
            margin: 5px 0;
        }
        h2 {
        text-align: center; 
        margin-bottom:20px;
        }
    </style>
</head>
<body>
     <!-- Required Elements per Page Start -->
     <?php include 'header.php'; ?>                               <!-- Header .php -->
      <?php include './assets/scripts/frameworkLib.php'; ?>        <!-- Framework PHP Script Reference-->
  <!-- Required Elements per Page End -->

  <h2>Cart</h2>
  <div class="cart-container">
    <?php
    session_start();

    // Function to add item to cart
    function addToCart($itemName, $price) {
      if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
      }

      // Check if the item is already in the cart
      $found = false;
      foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $itemName) {
          $item['quantity']++;
          $found = true;
          break;
        }
      }

      if (!$found) {
        array_push($_SESSION['cart'], array(
          'name' => $itemName,
          'price' => $price,
          'quantity' => 1
        ));
      }
    }

    // Check if a POST request containing item information exists
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemName']) && isset($_POST['price'])) {
      addToCart($_POST['itemName'], $_POST['price']);
    }

    // Function to display cart contents
    function displayCart() {
      if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $item) {
          echo "<div class='cart-item'>";
          echo "<p>Name: {$item['name']}</p>";
          echo "<p>Price: &#8369;{$item['price']}</p>";
          echo "<p>Quantity: {$item['quantity']}</p>";
          echo "</div>";
        }
      } else {
        echo "<p>Your cart is empty.</p>";
      }
    }

    displayCart(); // Display cart contents
    ?>
  </div>
</body>
</html>
