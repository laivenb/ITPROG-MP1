

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Summary</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <!-- Import Header Stylesheet -->
  <link rel="stylesheet" href="assets/styles/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ddcdc0; /* Set your desired background color */
    }

    h2 {
        font-family: 'IntroRust-Base', sans-serif;
      text-align: left; /* Center the "MAIN DISHES" heading */
    }

    h3 {
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

    .container-wrapper {
      display: flex; /* Use flexbox layout */
      justify-content: space-between; /* Align items with space in between */
      margin-top: 20px; /* Add margin at the top */
    }

    .contact-container {
        width: 60%; /* Set the container width */
        padding: 20px; /* Add some padding */
        background-color: transparent; /* Set background color for the container */
        border-radius: 10px; /* Add border-radius for rounded corners */
        position: relative; /* Set the container position to relative */
        margin-left: 2%;
    }

    .order-summary {
      width: 30%; /* Set the container width */
      padding: 20px; /* Add some padding */
      background-color: #ffffff; /* Set white background */
      border-radius: 10px; /* Add border-radius for rounded corners */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
      position: relative; /* Set the container position to relative */
      margin-right: 4%;
      margin-top: 3%;
    }

    .custom-button {
        position: relative; /* Change position to relative */
        left: 0; /* Reset left position */
        bottom: 20px; /* Adjust the bottom position */
        background-color: #944e30;
        border-radius: 15px;
        color: #ffffff;
        border: none;
        cursor: pointer;
        padding: 10px 0; /* Adjust padding */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underline */
        width: 100%; /* Make button fill the whole width */
        transition: background-color 0.3s ease;
    }


        .custom-button:hover {
      background-color: #663300; /* Change background color on hover */
    }


    .cancel-button{
        position: relative; /* Change position to relative */
        left: 0; /* Reset left position */
        bottom: 20px; /* Adjust the bottom position */
        background-color: #944e30;
        border-radius: 15px;
        color: #ffffff;
        border: none;
        cursor: pointer;
        padding: 10px 0; /* Adjust padding */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underline */
        width: 100%; /* Make button fill the whole width */
        transition: background-color 0.3s ease;
    }


        .cancel-button:hover{
      background-color: #663300; /* Change background color on hover */
    }


.payment-section {
    background-color: #ffffff; /* Set white background */
    padding: 20px; /* Add some padding */
    border-radius: 10px; /* Add border-radius for rounded corners */
    margin-top: 20px; /* Add margin at the top */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    width: 30%;
    position: relative; /* Change position to relative */
}

    .payment-section {
        background-color: #ffffff; /* Set white background */
        padding: 20px; /* Add some padding */
        border-radius: 10px; /* Add border-radius for rounded corners */
        margin-top: 20px; /* Add margin at the top */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        width: 30%;
        }
    .dish-image img{
      width: 50px;
      height: 50px;
      background-color: #ccc; /* Default color or background */
      display: inline-block;
      margin-right: 10px; /* Add some space between the image box and the dish name */
    }
    .dish {
      display: flex; /* Use flexbox layout */
      align-items: center; /* Align items vertically */
    }

    .dish {
      display: flex; /* Use flexbox layout */
      align-items: center; /* Align items vertically */
      justify-content: space-between; /* Space between items */
    }

    .dish-name {
      flex-grow: 1; /* Allow dish name to grow and fill remaining space */
      text-align: left; /* Align dish name to the left */
      margin-right: 10px; /* Add some space between the dish name and controls */
    }

    .quantity-controls {
      display: flex; /* Use flexbox layout */
      align-items: center; /* Align items vertically */
    }

    .subtract, .quantity, .add {
      margin: 0 5px; /* Add margin around the controls */
      cursor: pointer; /* Change cursor to pointer */
    }

    .dish-price {
      text-align: right; /* Align dish price to the right */
    }

    .discount,
    .total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    .discount-label {
        margin-bottom: 5px; /* Add margin below the label */
    }

    .discount-text {
        display: block; /* Change display to block to make it appear below */
        margin-left: 15px; /* Adjust the left margin to separate subtext from label */
        color: #666; /* Optionally change the color of the subtext */
        font-size: 0.9em; /* Optionally adjust the font size */
    }

    .modal-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        z-index: 1000; /* Ensure the modal is on top of other elements */
        justify-content: center;
        align-items: center;
    }

        /* Styles for the modal content */
        .modal-content {
            background-color: white; /* Set the background color */
            padding: 20px;
            border-radius: 15px; /* Add border-radius for rounded corners */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center content horizontally */
            color: white;
            position: relative; /* Add position relative */
        }

        .modal-content:before {
            content: ''; /* Add an empty content */
            position: absolute; /* Position it absolutely */
            top: -10px; /* Adjust top position */
            left: -10px; /* Adjust left position */
            right: -10px; /* Adjust right position */
            bottom: -10px; /* Adjust bottom position */
            background-color: white; /* Set the border color */
            border-radius: 15px; /* Add border-radius for rounded corners */
            z-index: -1; /* Ensure it's behind the modal content */
        }


    /* Styles for the buttons */
    .payment-confirmation-btn {
        margin: 5px;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 15px;
        background-color: #944e30;
        color: white;
        text-decoration: underline; /* Remove underline */
        transition: background-color 0.3s ease;
    }

    .payment-confirmation-btn:hover{
        background-color: #663300;
    }

  </style>
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
        <div class="discount dish">
            <div class="discount-label">Discount</div>
            <div class="discount-text">
                (COMBO NAME/CODE)
            </div>
            <span class="discount-price">$000</span>
        </div>


        <hr>
        <div class="total dish">
        TOTAL($) <span class="total-amount">$000</span>
        </div></br></br>
        <button class="cancel-button" id="cancel">CANCEL</button>
      </div>
    </div>
  </main>

  <script>
      var cartItemsJson = sessionStorage.getItem('cartItems');

      var cartItems = JSON.parse(cartItemsJson);

      console.log(cartItems);

      document.addEventListener('DOMContentLoaded', function() {
          var cartItemsJson = sessionStorage.getItem('cartItems');
          var cartItems = JSON.parse(cartItemsJson);

          var container = document.getElementById('order-summary-container');

          cartItems.forEach(function(item, index) {
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
              if (index < cartItems.length - 1) {
                  container.appendChild(document.createElement('hr'));
              }
          });
      });


      // Function to subtract quantity
    function subtractQuantity(dishNumber) {
        var quantityElement = document.getElementById('quantity-' + dishNumber);
        var quantity = parseInt(quantityElement.innerText);

        // Ensure quantity doesn't go below 0
        if (quantity > 0) {
            quantityElement.innerText = quantity - 1;
        }
    }

    // Function to add quantity
    function addQuantity(dishNumber) {
        var quantityElement = document.getElementById('quantity-' + dishNumber);
        var quantity = parseInt(quantityElement.innerText);

        // Increment quantity
        quantityElement.innerText = quantity + 1;
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
        // Proceed with payment logic if payment method is selected
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
