<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
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

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
    }

    .modal-content {
      background-color: white;
      width: 300px;
      margin: 100px auto;
      padding: 20px;
      border-radius: 5px;
    }
  </style>
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
    <h2>MAIN DISHES (ADMIN)</h2>
    <section class="menu-items">
      <article class="menu-item">
        <img src="assets/images/carbonara.jpg" alt="Carbonara"> 
        <p>Carbonara</p>
        <p>&#8369;350</p>
        <button class="delete-btn" data-id="1">Delete</button>
      </article>
      <article class="menu-item">
        <img src="assets/images/chicken_adobo.jpg" alt="Chicken Adobo">
        <p>Chicken Adobo</p>
        <p>&#8369;350</p>
        <button class="delete-btn" data-id="2">Delete</button>
      </article>
      <article class="menu-item">
        <img src="assets/images/salmon_steak.jpg" alt="Salmon Steak">
        <p>Salmon Steak</p>
        <p>&#8369;400</p>
        <button class="delete-btn" data-id="3">Delete</button>
      </article>
    </section>

    <!-- Modal for adding a new menu item -->
    <div class="modal">
      <div class="modal-content">
        <h3>Add New Menu Item</h3>
        <form id="add-menu-form" enctype="multipart/form-data">
  <label for="dish-image">Dish Image:</label><br>
  <input type="file" id="dish-image" name="dish-image" accept="image/*" required><br><br>

  <label for="dish-name">Dish Name:</label><br>
  <input type="text" id="dish-name" name="dish-name" required><br><br>

  <label for="dish-price">Dish Price (PHP):</label><br>
  <input type="number" id="dish-price" name="dish-price" required><br><br>

  <button type="submit">Add</button>
</form>
      </div>
    </div>
    

    <div class="navigation">
    <a href="#" class="add-menu-btn">Add Menu Item</button>
      <a href="#" class="next-btn">NEXT</a>
      <a href="#" class="cancel-btn">CANCEL</a>
    </div>

 
  </main>
  <script>
  // Get the modal
  const modal = document.querySelector('.modal');
  // Get the button that opens the modal
  const addMenuBtn = document.querySelector('.add-menu-btn');
  // Get the <span> element that closes the modal
  const closeModalBtn = document.querySelector('.cancel-btn');

  // When the user clicks the button, open the modal
  addMenuBtn.addEventListener('click', function() {
    modal.style.display = 'block';
  });

  // When the user clicks on <span> (x), close the modal
  closeModalBtn.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener('click', function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  });

  // Handle form submission
const addMenuForm = document.getElementById('add-menu-form');
addMenuForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission
  // Get form data
  const dishImageFile = document.getElementById('dish-image').files[0]; // Get the selected file
  const dishName = document.getElementById('dish-name').value;
  const dishPrice = document.getElementById('dish-price').value;

  // Create FormData object to send file data
  const formData = new FormData();
  formData.append('dish-image', dishImageFile);
  formData.append('dish-name', dishName);
  formData.append('dish-price', dishPrice);

  // Do something with the form data (e.g., send to server using AJAX)
  console.log('Dish Image File:', dishImageFile);
  console.log('Dish Name:', dishName);
  console.log('Dish Price:', dishPrice);

  // Close the modal after form submission
  modal.style.display = 'none';
  // You can perform further actions (e.g., AJAX request to add the item)
});
</script>
</body>
</html>