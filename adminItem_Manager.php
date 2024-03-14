<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkyCuisine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Required Elements per Page Start -->
    <?php include 'sideBar.php'; ?>                              <!-- SideBar .php -->
    <?php include './assets/scripts/frameworkLib.php'; ?>        <!-- Framework PHP Script Reference-->
    <!-- Required Elements per Page End -->
    <link rel="stylesheet" href="assets/styles/adminItem_Manager.css">
</head>

<body>
    <!-- Container Display Start -->
        <div class="boxContainers">
        <!-- Main Dish Display Start -->
            <div class="headerMainDish">
                <div class="categoryName">
                    <h1 class="Hmain">Main</h1>
                </div>
                <div class="headerAdd">
                    <span class="addSpanBtn"><button type="button" class="addMainBtn" data-bs-toggle="modal" data-bs-target="#addMainModal" >+  ADD</button></span>
                    <!-- Add Modal Start-->
                    <div class="modal fade" id="addMainModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modalContentMain">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Main Dish</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="mainDishForm" action="./assets/scripts/saveMdish.php" method="post">
                                        <label for="Mname">Main Dish Name:</label><br>
                                        <input type="text" id="Mname" name="Mname"><br>
                                        <label for="Mprice">Price:</label><br>
                                        <input type="text" id="Mprice" name="Mprice">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="saveChanges()" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Modal End -->
                </div>
            </div>
            <div class="mainHeaderContainers">
                <div><img src="./assets/images/admin/gray.png" alt="Image" width="50" height="50"></div>
                <div><span>Dish Name</span></div>
                <div><span>Price</span></div>
                <div><span></div>
                <div><span></div>
            </div>
            <?php
            include './assets/scripts/dbh.inc.php';

            try {
                $pdo = $GLOBALS['pdo'];
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query("SELECT * FROM maindish");

                echo "<div class='mainInfoContainers'>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imageSrc = "./assets/images/admin/".$row['dish_ID'].".jpg";
                    echo "<div><img src='".$imageSrc."' alt='Image' width='50' height='50'></div>";
                    echo "<div><span>".$row['dish_name']."</span></div>";
                    echo "<div><span>".$row['price']."</span></div>";
                    echo "<div><span><button type='button' class='btn btn-secondary'>Edit</button></span></div>";
                    echo "<div><span><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-dishname='".$row['dish_name']."' data-dishprice='".$row['price']."' onclick='logDishInfo(this)'>Delete</button></span></div>";

                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Main Dish Display End -->
            <!-- Modal Delete Start -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modalContentMain">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Dish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete the dish?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" onclick="deleteDish()" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Delete End -->

            <!-- Side Dish Display Start -->
            <div class="headerMainDish">
                <div class="categoryName">
                    <h1 class="Hmain">Side</h1>
                </div>
                <div class="headerAdd">
                    <span class="addBtn">+  ADD</span>
                </div>
            </div>
            <div class="mainHeaderContainers">
                <div><img src="./assets/images/admin/gray.png" alt="Image" width="50" height="50"></div>
                <div><span>Dish Name</span></div>
                <div><span>Price</span></div>
                <div><span></div>
                <div><span></div>
            </div>
            <?php
            include './assets/scripts/dbh.inc.php';

            try {
                $pdo = $GLOBALS['pdo'];
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query("SELECT * FROM sidedish");

                echo "<div class='mainInfoContainers'>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imageSrc = "./assets/images/admin/".$row['side_ID']."-side.jpg";
                    echo "<div><img src='".$imageSrc."' alt='Image' width='50' height='50'></div>";
                    echo "<div><span>".$row['side_name']."</span></div>";
                    echo "<div><span>".$row['price']."</span></div>";
                    echo "<div><span><button type='button' class='btn btn-secondary'>Edit</button></span></div>";
                    echo "<div><span><button type='button' class='btn btn-danger'>Delete</button></span></div>";
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Side Dish Display Start -->
            <!-- Drink Display Start -->
            <div class="headerMainDish">
                <div class="categoryName">
                    <h1 class="Hmain">Drink</h1>
                </div>
                <div class="headerAdd">
                    <span class="addBtn">+  ADD</span>
                </div>
            </div>
            <div class="mainHeaderContainers">
                <div><img src="./assets/images/admin/gray.png" alt="Image" width="50" height="50"></div>
                <div><span>Dish Name</span></div>
                <div><span>Price</span></div>
                <div><span></div>
                <div><span></div>
            </div>
            <?php
            include './assets/scripts/dbh.inc.php';

            try {
                $pdo = $GLOBALS['pdo'];
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query("SELECT * FROM drink");

                echo "<div class='mainInfoContainers'>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imageSrc = "./assets/images/admin/".$row['drink_ID']."-drink.jpg";
                    echo "<div><img src='".$imageSrc."' alt='Image' width='50' height='50'></div>";
                    echo "<div><span>".$row['drink_name']."</span></div>";
                    echo "<div><span>".$row['price']."</span></div>";
                    echo "<div><span><button type='button' class='btn btn-secondary'>Edit</button></span></div>";
                    echo "<div><span><button type='button' class='btn btn-danger'>Delete</button></span></div>";
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Drink Display Start -->
            <!-- Combo Display Start -->
            <div class="headerMainDish">
                <div class="categoryName">
                    <h1 class="Hmain">Combo</h1>
                </div>
                <div class="headerAdd">
                    <span class="addBtn">+  ADD</span>
                </div>
            </div>
            <div class="mainHeaderContainers">
                <div><img src="./assets/images/admin/gray.png" alt="Image" width="50" height="50"></div>
                <div><span>Dish Name</span></div>
                <div><span>Price</span></div>
                <div><span></div>
                <div><span></div>
            </div>
            <?php
            include './assets/scripts/dbh.inc.php';

            try {
                $pdo = $GLOBALS['pdo'];
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query("SELECT * FROM combo");

                echo "<div class='mainInfoContainers'>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imageSrc = "./assets/images/admin/".$row['combo_ID']."-combo.jpg";
                    echo "<div><img src='".$imageSrc."' alt='Image' width='50' height='50'></div>";
                    echo "<div><span>".$row['combo_Name']."</span></div>";
                    echo "<div><span>".$row['price']."</span></div>";
                    echo "<div><span><button type='button' class='btn btn-secondary'>Edit</button></span></div>";
                    echo "<div><span><button type='button' class='btn btn-danger'>Delete</button></span></div>";
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Combo Display Start -->
            <!-- Spacer Start -->
            <div class="spacer"></div>
            <!-- Spacer Start -->
        </div>
    <!-- Container Display End -->
</body>

    <script>
            var currentdishName;

            function saveChanges() {
                document.getElementById('mainDishForm').submit();

                $('#addMainModal').modal('hide');
            }

            function logDishInfo(button) {
                currentdishName = button.getAttribute('data-dishname');
                var dishPrice = button.getAttribute('data-dishprice');
                console.log('Dish Name:', currentdishName);
                console.log('Dish Price:', dishPrice);
            }

            function deleteDish() {
                if (!currentdishName) {
                    console.error('No dish selected.');
                    return;
                }
                // Send a POST request to editPrice.php
                fetch('./assets/scripts/editPrice.php', {
                    method: 'POST',
                    body: 'dishName=' + encodeURIComponent(currentdishName),
                })
                    .then(response => response.text())
                    .then(data => console.log('Response from editPrice.php:', data))
                    .catch(error => console.error('Error:', error));

                currentdishName = null; // Reset the currentDishName after deletion
            }


    </script>

</html>