<?php
session_start();
$cartItems = isset($_SESSION['cartItems']) ? $_SESSION['cartItems'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Summary</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <!-- Import Header Stylesheet -->
    <link rel="stylesheet" href="assets/styles/order_summary.css">
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Required Elements per Page Start -->
  <?php include 'header.php'; ?> <!-- Header .php -->
  <?php include './assets/scripts/frameworkLib.php'; ?> <!-- Framework PHP Script Reference-->
  <!-- Required Elements per Page End -->

  <main>
    <div class="container-wrapper">
      <div class="contact-container">
        <h2 class="introrustbase-font">Contact</h2>
        <form>
          <div class="row">
            <!-- First Name and Last Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Email and Phone -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Flight Number and Seat Number -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="flight-number">Flight Number:</label>
                <input type="text" id="flight-number" name="flight-number" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="seat-number">Seat Number:</label>
                <input type="text" id="seat-number" name="seat-number" class="form-control" required>
              </div>
            </div>
          </div>
          <br>
          <!-- Additional Payment Via section -->
          <div class="payment-section">
            <div class="form-group">
                <label for="payment-method" class="introrustbase-font">Payment Via:</label>
                <div>
                    <input type="radio" id="credit-card" name="payment-method" value="credit-card">
                    <label for="credit-card">Credit Card</label>
                </div>
                <div>
                    <input type="radio" id="debit-card" name="payment-method" value="debit-card">
                    <label for="debit-card">Debit Card</label>
                </div>
                <div>
                    <input type="radio" id="gcash" name="payment-method" value="gcash">
                    <label for="gcash">GCASH</label>
                </div>
            </div>
            <div id="payment-notification" style="color: red;"></div>
        </div>

        <div class="modal-container" id="modal-container">
            <div class="modal-content">
                <h2 class="introrustbase-font">PAYMENT CONFIRMATION</h2>
                <p class="introrustbase-font">Input Card/GCASH Credentials</p>
                <input type="text" id="payment-input" placeholder="Enter your credentials" class="introrustbase-font">
                <div style="display: flex; justify-content: center; margin-top: 10px;">
                    <button class="payment-confirmation-btn" onclick="pay()">Pay</button>
                    <button class="payment-confirmation-btn" onclick="cancel()">Cancel</button>
                </div>
            </div>
        </div>

          <!-- End of Payment Via section -->
          <br><br>
          <!-- Button for placing order -->
          <button class="custom-button" id="placeorder">PLACE ORDER</button>
        </form>
      </div>

      <div class="order-summary" id="order-summary-container">
        <h3>Order Summary</h3>

        <hr>
        <div class="total dish">
        TOTAL(₱) <span class="totalAmount">$0.00</span>
        </div></br></br>
        <button class="cancel-button" id="cancel">CANCEL</button>
      </div>
    </div>
  </main>

  <script>
      var cartItems = <?php echo json_encode($cartItems); ?>;
      var cartItemsJson = sessionStorage.getItem('cartItems');
      var cartItems = cartItemsJson ? JSON.parse(cartItemsJson) : [];

      function updateTotalPrice() {
          var cartItemsJson = sessionStorage.getItem('cartItems');
          var cartItems = JSON.parse(cartItemsJson);

          var total = 0;
          cartItems.forEach(function(item) {
              var itemTotal = parseFloat(item.dishPrice.replace('₱', '')) * parseInt(item.quantity);
              total += itemTotal;

              console.log("Item:", item.dishName, "Price:", item.dishPrice, "Quantity:", item.quantity, "Total:", itemTotal);
          });

          console.log("Total price:", total);

          var totalAmountElement = document.querySelector('.totalAmount');
          if (totalAmountElement) {
              totalAmountElement.textContent = '₱' + total.toFixed(2);
          } else {
              console.log('Total amount element not found');
          }
      }


      document.addEventListener('DOMContentLoaded', function() {
          var cartItemsJson = sessionStorage.getItem('cartItems');
          var cartItemsFromSession = JSON.parse(cartItemsJson);

          var container = document.getElementById('order-summary-container');

          cartItemsFromSession.forEach(function(item, index) {
              var div = document.createElement('div');
              div.className = 'dish';

              var imageBox = document.createElement('div');
              imageBox.className = 'dish-image';
              var img = document.createElement('img');
              img.src = item.imgName;
              img.alt = item.dishName;
              imageBox.appendChild(img);

              var nameSpan = document.createElement('span');
              nameSpan.textContent = item.dishName;

              var quantitySpan = document.createElement('span');
              quantitySpan.className = 'quantity';
              quantitySpan.textContent = item.quantity;

              var addSpan = document.createElement('span');
              addSpan.className = 'add';
              addSpan.textContent = '+';
              addSpan.addEventListener('click', function() {
                  addQuantity(index);
              });

              var subtractSpan = document.createElement('span');
              subtractSpan.className = 'subtract';
              subtractSpan.textContent = '-';
              subtractSpan.addEventListener('click', function() {
                  subtractQuantity(index);
              });

              var priceSpan = document.createElement('span');
              priceSpan.className = 'dish-price';
              priceSpan.textContent = item.dishPrice;

              div.appendChild(imageBox);
              div.appendChild(nameSpan);
              div.appendChild(subtractSpan);
              div.appendChild(quantitySpan);
              div.appendChild(addSpan);
              div.appendChild(priceSpan);

              container.appendChild(div);
              if (index < cartItemsFromSession.length - 1) {
                  container.appendChild(document.createElement('hr'));
              }
          });

          // Calculate and display total price
          updateTotalPrice();
      });




      // Function to subtract quantity
      function subtractQuantity(dishNumber) {
          var cartItemsJson = sessionStorage.getItem('cartItems');
          var cartItems = JSON.parse(cartItemsJson);

          // Get the quantity from the cartItems array
          var quantity = parseInt(cartItems[dishNumber].quantity);

          // Ensure quantity doesn't go below 0
          if (quantity > 0) {
              // Update the quantity in the cartItems array
              cartItems[dishNumber].quantity = quantity - 1;

              // Update the quantity displayed in the HTML
              var quantityElement = document.getElementById(dishNumber);
              quantityElement.innerText = cartItems[dishNumber].quantity;

              // Update the cartItems in sessionStorage
              sessionStorage.setItem('cartItems', JSON.stringify(cartItems));

              // Update the total price and quantity
              updateTotalPrice();
          }
      }

      // Function to add quantity
      function addQuantity(dishNumber) {
          var cartItemsJson = sessionStorage.getItem('cartItems');
          var cartItems = JSON.parse(cartItemsJson);

          // Get the quantity from the cartItems array
          var quantity = parseInt(cartItems[dishNumber].quantity);

          // Increment quantity
          cartItems[dishNumber].quantity = quantity + 1;

          // Update the cartItems in sessionStorage
          sessionStorage.setItem('cartItems', JSON.stringify(cartItems));

          // Update the total price and quantity
          updateTotalPrice();

          window.location.reload();
      }

      // Function to handle payment
      function handlePayment() {
          var paymentMethods = document.getElementsByName("payment-method");
          var isValidPayment = false;
          for (var i = 0; i < paymentMethods.length; i++) {
              if (paymentMethods[i].checked) {
                  isValidPayment = true;
                  break;
              }
          }
          if (!isValidPayment) {
              document.getElementById("payment-notification").innerText = "Invalid! Please select a mode of payment.";
              return false;
          }

          var totalAmountElement = document.querySelector('.totalAmount');
          var totalPrice = totalAmountElement ? totalAmountElement.textContent : "0.00";

          var form = document.createElement('form');
          form.setAttribute('method', 'post');
          form.setAttribute('action', 'saveTransaction.php');
          var totalPriceInput = document.createElement('input');
          totalPriceInput.setAttribute('type', 'hidden');
          totalPriceInput.setAttribute('name', 'totalPrice');
          totalPriceInput.setAttribute('value', totalPrice);
          form.appendChild(totalPriceInput);
          document.body.appendChild(form);
          form.submit();

          return true;
      }

        // Function to handle form submission
    document.getElementById("placeorder").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        if (!handlePayment()) {
            // If payment is not valid, show notification and return
            return;
        }
        showModal(); // Display the modal if payment is valid
    });

    // JavaScript functions to show and hide the modal
    function showModal() {
        var modal = document.getElementById("modal-container");
        modal.style.display = "flex"; // Display the modal container
    }

    function hideModal() {
        var modal = document.getElementById("modal-container");
        modal.style.display = "none"; // Hide the modal container
    }

    // Sample functions for the pay and cancel buttons
    function pay() {
        alert("Payment successful!");
        hideModal();
    }

    function cancel() {
        alert("Payment cancelled.");
        hideModal();
    }
</script>

</body>
</html>
