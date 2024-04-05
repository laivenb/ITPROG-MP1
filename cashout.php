<?php
session_start();
$cartItemsJson = isset($_SESSION['cartItems']) ? $_SESSION['cartItems'] : '[]';
$cartItems = json_decode($cartItemsJson, true); // Decode JSON string to array

$flightNumber = isset($_POST['flight-number']) ? $_POST['flight-number'] : '';
$seatNumber = isset($_POST['seat-number']) ? $_POST['seat-number'] : '';
$firstName = isset($_POST['first-name']) ? $_POST['first-name'] : '';
$lastName = isset($_POST['last-name']) ? $_POST['last-name'] : '';

$customerName = $lastName . ' ' . $firstName;

$_SESSION['orderNumber'] = 11003;

// Get the current order number from the session or set it to 11003 if it doesn't exist
$orderNumber = isset($_SESSION['orderNumber']) ? $_SESSION['orderNumber'] : 11003;

$orderNumber++;

$_SESSION['orderNumber'] = $orderNumber;

// Convert the order number to a format with leading zeros for consistent display
$formattedOrderNumber = sprintf("%05d", $orderNumber);

// Remove items with zero quantity
$cartItems = array_filter($cartItems, function($item) {
    return $item['quantity'] > 0;
});


$_SESSION['cartItems'] = json_encode($cartItems);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cashout</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
    background-color: #000000; /* Set the background color to black */
    color: #ffffff; /* Set text color to white for better readability */
    margin: 0; /* Remove default margin */
    padding: 0; /* Remove default padding */
  }

  main {
    background-image: url('./assets/images/SkyBG50.png'); /* Set background color of main section */
    padding: 20px; /* Add some padding for better appearance */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .receipt-container {
    text-align: center;
    padding: 40px; /* Increase padding for better spacing */
    border: 2px solid #ffffff;
    border-radius: 20px;
    width: 80%; /* Set the width to 80% of the viewport width */
    max-width: 600px; /* Set a maximum width to maintain readability */
    height: auto; /* Allow the height to adjust based on content */
    margin: 20px; /* Add margin for spacing */
    font-weight: bold;
  }

  .receipt-container h2 {
    margin-bottom: 10px;
  }

  .receipt-container hr {
    margin: 20px 0;
    border: none;
    border-top: 2px solid #ffffff;
  }

  .receipt-container .order-details {
    text-align: left;
    margin-bottom: 20px;
  }

  .receipt-container .order-total {
    margin-top: 20px;
  }

  .navigation {
    position: absolute;
    bottom: 20px;
    right: 20px;
  }

  .navigation button {
    padding: 10px 20px;
    border: none;
    background-color: #944e30;
    color: #d39d56;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }

  .navigation button:hover {
    background-color: #d39d56;
    color: #ffffff;
  }

  .custom-button {
    position: absolute;
    top: 86%;
    width: 20%;
    right: 65px;
    transform: translateY(-50%);
    background-color: #944e30;
    border-radius: 15px;
    color: #ffffff;
    border: none;
    cursor: pointer;
    padding: 10px 60px;
    text-decoration: underline;
    transition: background-color 0.3s ease;
  }

  .custom-button:hover {
    background-color: #663300; /* Change background color on hover */
  }

  .receipt-container .order-details p {
    margin: 5px 0;
    display: flex;
    justify-content: space-between;
  }

  .receipt-container .order-details p .dish-name {
    flex: 1;
    text-align: left;
  }

  .receipt-container .order-details p .dish-price {
    text-align: right;
  }

  .receipt-container .order-details p .label {
    flex: 1;
    text-align: left;
  }
  </style>
</head>
<body>
  <!-- Required Elements per Page Start -->
  <?php include 'userheader.php'; ?> <!-- Header .php -->
  <?php include './assets/scripts/frameworkLib.php'; ?> <!-- Framework PHP Script Reference-->
  <!-- Required Elements per Page End -->

  <main>
    <div class="receipt-container">
      <h2>WE'VE GOT YOUR ORDER</h2>
      <p>Ready to dig in? Your order is now being prepared!</p>
      <div class="order-details">
      <p>Order <span id="order-number">#<?php echo $formattedOrderNumber; ?></span> JM Mariano, 1C , 217.</p>
        <?php
        // Check if there are items in the cart
        if (!empty($cartItems)) {
            $subtotal = 0; 
            foreach ($cartItems as $index => $item) {
                $itemName = $item['dishName'];
                $itemPrice = $item['dishPrice'];
                $quantity = $item['quantity'];
                $totalPrice = $quantity * str_replace('₱', '', $itemPrice);
                $subtotal += $totalPrice;

                echo '<p><span class="dish-name">' . $itemName . '</span><span class="dish-price">' . $itemPrice . '</span></p>';
            }
            echo '<hr>';
            echo '<p><span class="label">Subtotal</span><span>₱' . number_format($subtotal, 2) . '</span></p>';
            echo '<p><span class="label">Discount</span><span>₱0.00</span></p>';
            echo '<hr>';
            echo '<p><span class="label">Total</span><span>₱' . number_format($subtotal, 2) . '</span></p>';
        } else {
            // If cart is empty, display Your cart is empty
            echo '<p>Your cart is empty.</p>';
        }
        ?>
      </div>
    </div>

    <button class="custom-button" onclick="OK()">OK</button>
  </main>

  <!-- You can add your JavaScript function for checkout handling here -->
  <script>
    function OK() {
      // Add your checkout logic here
      alert("Redirecting to checkout page...");
      // You can redirect the user to the checkout page or perform any other action you need
      window.location.href = "userdashboard.php";

    }
  </script>
</body>
</html>
