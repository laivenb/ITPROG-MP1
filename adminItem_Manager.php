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
                    if ($row['price'] != 9999) {
                        $imageSrc = "./assets/images/admin/".$row['dish_ID'].".jpg";
                        echo "<div><img src='".$imageSrc."' alt='Image' width='50' height='50'></div>";
                        echo "<div><span>".$row['dish_name']."</span></div>";
                        echo "<div><span>".$row['price']."</span></div>";
                        echo "<div><span><button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#editModal' data-dishname='".$row['dish_name']."' data-dishprice='".$row['price']."' onclick='logDishInfo(this)'>Edit</button></span></div>";
                        echo "<div><span><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-dishname='".$row['dish_name']."' data-dishprice='".$row['price']."' onclick='logDishInfo(this)'>Delete</button></span></div>";
                    }
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Main Dish Display End -->
            <!-- Modal Main Delete Start -->
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
            <!-- Modal Main Delete End -->
            <!-- Modal Main Edit Start -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modalContentMain">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Dish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="mainDishPriceForm">
                                <label for="inputMprice">Price:</label><br>
                                <input type="text" id="inputMprice" name="inputMprice"><br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" onclick="editDish()" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Main Edit End -->
            <!-- Side Dish Display Start -->
            <div class="headerMainDish">
                <div class="categoryName">
                    <h1 class="Hmain">Side</h1>
                </div>
                <div class="headerAdd">
                    <span class="addSpanBtn"><button type="button" class="addSideBtn" data-bs-toggle="modal" data-bs-target="#addSideModal" >+  ADD</button></span>
                    <!-- Add Side Modal Start-->
                    <div class="modal fade" id="addSideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modalContentMain">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Side Dish</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="sideDishForm" action="./assets/scripts/saveSdish.php" method="post">
                                        <label for="Sname">Side Dish Name:</label><br>
                                        <input type="text" id="Sname" name="Sname"><br>
                                        <label for="Sprice">Price:</label><br>
                                        <input type="text" id="Sprice" name="Sprice">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="saveSideChanges()" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Side Modal End -->
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
                    if ($row['price'] != 9999) {
                        $imageSrc = "./assets/images/admin/" . $row['side_ID'] . "-side.jpg";
                        echo "<div><img src='" . $imageSrc . "' alt='Image' width='50' height='50'></div>";
                        echo "<div><span>" . $row['side_name'] . "</span></div>";
                        echo "<div><span>" . $row['price'] . "</span></div>";
                        echo "<div><span><button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#editSideModal' data-dishname='" . $row['side_name'] . "' data-dishprice='" . $row['price'] . "' onclick='logDishInfo(this)'>Edit</button></span></div>";
                        echo "<div><span><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteSideModal' data-dishname='" . $row['side_name'] . "' data-dishprice='" . $row['price'] . "' onclick='logDishInfo(this)'>Delete</button></span></div>";
                    }
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Side Dish Display Start -->
            <!-- Modal Side Delete Start -->
            <div class="modal fade" id="deleteSideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" onclick="deleteSideDish()" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Side Delete End -->
            <!-- Modal Side Edit Start -->
            <div class="modal fade" id="editSideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modalContentMain">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Dish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="mainDishPriceForm">
                                <label for="inputSprice">Price:</label><br>
                                <input type="text" id="inputSprice" name="inputSprice"><br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" onclick="editSideDish()" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Side Edit End -->
            <!-- Drink Display Start -->
            <div class="headerMainDish">
                <div class="categoryName">
                    <h1 class="Hmain">Drink</h1>
                </div>
                <div class="headerAdd">
                    <span class="addSpanBtn"><button type="button" class="addDrinkBtn" data-bs-toggle="modal" data-bs-target="#addDrinkModal" >+  ADD</button></span>
                    <!-- Add Drink Modal Start-->
                    <div class="modal fade" id="addDrinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modalContentMain">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Drink Dish</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="drinkDishForm" action="./assets/scripts/saveDdish.php" method="post">
                                        <label for="Dname">Drink Name:</label><br>
                                        <input type="text" id="Dname" name="Dname"><br>
                                        <label for="Dprice">Price:</label><br>
                                        <input type="text" id="Dprice" name="Dprice">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="saveDrinkChanges()" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Drink Modal End -->
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
                    if ($row['price'] != 9999) {
                        $imageSrc = "./assets/images/admin/" . $row['drink_ID'] . "-drink.jpg";
                        echo "<div><img src='" . $imageSrc . "' alt='Image' width='50' height='50'></div>";
                        echo "<div><span>" . $row['drink_name'] . "</span></div>";
                        echo "<div><span>" . $row['price'] . "</span></div>";
                        echo "<div><span><button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#editDrinkModal' data-dishname='" . $row['drink_name'] . "' data-dishprice='" . $row['price'] . "' onclick='logDishInfo(this)'>Edit</button></span></div>";
                        echo "<div><span><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteDrinkModal' data-dishname='" . $row['drink_name'] . "' data-dishprice='" . $row['price'] . "' onclick='logDishInfo(this)'>Delete</button></span></div>";
                    }
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Drink Display End -->
            <!-- Modal Drink Delete Start -->
            <div class="modal fade" id="deleteDrinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" onclick="deleteDrinkDish()" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Drink Delete End -->
            <!-- Modal Drink Edit Start -->
            <div class="modal fade" id="editDrinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modalContentMain">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Dish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="mainDishPriceForm">
                                <label for="inputDprice">Price:</label><br>
                                <input type="text" id="inputDprice" name="inputDprice"><br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" onclick="editDrinkDish()" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Drink Edit End -->
            <!-- Combo Display Start -->
            <div class="headerMainDish">
                <div class="categoryName">
                    <h1 class="Hmain">Combo</h1>
                </div>
                <div class="headerAdd">
                    <span class="addSpanBtn"><button type="button" class="addComboBtn" data-bs-toggle="modal" data-bs-target="#addComboModal" >+  ADD</button></span>
                    <!-- Add Drink Modal Start-->
                    <div class="modal fade" id="addComboModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modalContentMain">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Combo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="comboDishForm" action="./assets/scripts/saveCdish.php" method="post">
                                        <label for="Cname">Combo Name:</label><br>
                                        <input type="text" id="Cname" name="Cname"><br>
                                        <label for="Cprice">Price:</label><br>
                                        <input type="text" id="Cprice" name="Cprice">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="saveComboChanges()" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Drink Modal End -->
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
                    if ($row['price'] != 9999) {
                        $imageSrc = "./assets/images/admin/" . $row['combo_ID'] . "-combo.jpg";
                        echo "<div><img src='" . $imageSrc . "' alt='Image' width='50' height='50'></div>";
                        echo "<div><span>" . $row['combo_Name'] . "</span></div>";
                        echo "<div><span>" . $row['price'] . "</span></div>";
                        echo "<div><span><button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#editComboModal' data-dishname='" . $row['combo_Name'] . "' data-dishprice='" . $row['price'] . "' onclick='logDishInfo(this)'>Edit</button></span></div>";
                        echo "<div><span><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteComboModal' data-dishname='" . $row['combo_Name'] . "' data-dishprice='" . $row['price'] . "' onclick='logDishInfo(this)'>Delete</button></span></div>";
                    }
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Combo Display End -->
            <!-- Modal Drink Delete Start -->
            <div class="modal fade" id="deleteComboModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" onclick="deleteComboDish()" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Drink Delete End -->
            <!-- Modal Drink Edit Start -->
            <div class="modal fade" id="editComboModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modalContentMain">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Dish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="mainDishPriceForm">
                                <label for="inputCprice">Price:</label><br>
                                <input type="text" id="inputCprice" name="inputCprice"><br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" onclick="editComboDish()" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Drink Edit End -->
            <!-- Spacer Start -->
            <div class="spacer"></div>
            <!-- Spacer Start -->
        </div>
    <!-- Container Display End -->
</body>

    <script>
            var currentdishName;

            // Add Dishes Function Start
            function saveChanges() {
                document.getElementById('mainDishForm').submit();

                $('#addMainModal').modal('hide');
            }

            function saveSideChanges() {
                document.getElementById('sideDishForm').submit();

                $('#addSideModal').modal('hide');
            }

            function saveDrinkChanges() {
                document.getElementById('drinkDishForm').submit();

                $('#addDrinkModal').modal('hide');
            }

            function saveComboChanges() {
                document.getElementById('comboDishForm').submit();

                $('#addComboModal').modal('hide');
            }
            // Add Dishes Function End

            // Log Dish Function Start
            function logDishInfo(button) {
                currentdishName = button.getAttribute('data-dishname');
                var dishPrice = button.getAttribute('data-dishprice');
                console.log('Dish Name:', currentdishName);
                console.log('Dish Price:', dishPrice);
            }
            // Log Dish Function End

            // Delete Function Start
            async function deleteDish() {
                if (!currentdishName) {
                    console.error('No dish selected.');
                    return;
                }

                const formData = new FormData();
                formData.append('dishName', currentdishName);

                try {
                    const response = await fetch('./assets/scripts/editPrice.php', {
                        method: 'POST',
                        body: formData,
                    });
                    const data = await response.text();
                    console.log('Response from editPrice.php:', data);
                    window.location.href = 'http://localhost/ITPROG-MP1/adminItem_Manager.php';
                } catch (error) {
                    console.error('Error:', error);
                }

                currentdishName = null;
            }

            async function deleteComboDish() {
                if (!currentdishName) {
                    console.error('No dish selected.');
                    return;
                }

                const formData = new FormData();
                formData.append('dishName', currentdishName);

                try {
                    const response = await fetch('./assets/scripts/deleteCdish.php', {
                        method: 'POST',
                        body: formData,
                    });
                    const data = await response.text();
                    console.log('Response from editPrice.php:', data);
                    window.location.href = 'http://localhost/ITPROG-MP1/adminItem_Manager.php';
                } catch (error) {
                    console.error('Error:', error);
                }

                currentdishName = null;
            }

            async function deleteDrinkDish() {
                if (!currentdishName) {
                    console.error('No dish selected.');
                    return;
                }

                const formData = new FormData();
                formData.append('dishName', currentdishName);

                try {
                    const response = await fetch('./assets/scripts/deleteDdish.php', {
                        method: 'POST',
                        body: formData,
                    });
                    const data = await response.text();
                    console.log('Response from editPrice.php:', data);
                    window.location.href = 'http://localhost/ITPROG-MP1/adminItem_Manager.php';
                } catch (error) {
                    console.error('Error:', error);
                }

                currentdishName = null;
            }

            async function deleteSideDish() {
                if (!currentdishName) {
                    console.error('No dish selected.');
                    return;
                }

                const formData = new FormData();
                formData.append('dishName', currentdishName);

                try {
                    const response = await fetch('./assets/scripts/deleteSdish.php', {
                        method: 'POST',
                        body: formData,
                    });
                    const data = await response.text();
                    console.log('Response from editPrice.php:', data);
                    window.location.href = 'http://localhost/ITPROG-MP1/adminItem_Manager.php';
                } catch (error) {
                    console.error('Error:', error);
                }

                currentdishName = null;
            }

            // Delete Function End

            // Edit Function Start
            async function editDish() {
                const newPrice = document.getElementById('inputMprice').value;
                console.log(newPrice);
                if (!currentdishName || !newPrice) {
                    console.error('No dish or price selected.');
                    return;
                }

                const form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', './assets/scripts/editMdish.php');

                const dishNameInput = document.createElement('input');
                dishNameInput.setAttribute('type', 'hidden');
                dishNameInput.setAttribute('name', 'dishName');
                dishNameInput.setAttribute('value', currentdishName);

                const newPriceInput = document.createElement('input');
                newPriceInput.setAttribute('type', 'hidden');
                newPriceInput.setAttribute('name', 'newPrice');
                newPriceInput.setAttribute('value', newPrice);

                form.appendChild(dishNameInput);
                form.appendChild(newPriceInput);

                document.body.appendChild(form);

                form.submit();

            }

            async function editSideDish() {
                const newPrice = document.getElementById('inputSprice').value;
                console.log(newPrice);
                if (!newPrice) {
                    console.error('No price selected.');
                    return;
                }

                const form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', './assets/scripts/editSdish.php');

                const dishNameInput = document.createElement('input');
                dishNameInput.setAttribute('type', 'hidden');
                dishNameInput.setAttribute('name', 'dishName');
                dishNameInput.setAttribute('value', currentdishName);

                const newPriceInput = document.createElement('input');
                newPriceInput.setAttribute('type', 'hidden');
                newPriceInput.setAttribute('name', 'newPrice');
                newPriceInput.setAttribute('value', newPrice);

                form.appendChild(dishNameInput);
                form.appendChild(newPriceInput);

                document.body.appendChild(form);

                form.submit();
            }

            async function editDrinkDish() {
                const newPrice = document.getElementById('inputDprice').value;
                console.log(newPrice);
                if (!newPrice) {
                    console.error('No price selected.');
                    return;
                }

                const form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', './assets/scripts/editDdish.php');

                const dishNameInput = document.createElement('input');
                dishNameInput.setAttribute('type', 'hidden');
                dishNameInput.setAttribute('name', 'dishName');
                dishNameInput.setAttribute('value', currentdishName);

                const newPriceInput = document.createElement('input');
                newPriceInput.setAttribute('type', 'hidden');
                newPriceInput.setAttribute('name', 'newPrice');
                newPriceInput.setAttribute('value', newPrice);

                form.appendChild(dishNameInput);
                form.appendChild(newPriceInput);

                document.body.appendChild(form);

                form.submit();
            }

            async function editComboDish() {
                const newPrice = document.getElementById('inputCprice').value;
                console.log(newPrice);
                if (!newPrice) {
                    console.error('No price selected.');
                    return;
                }

                const form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', './assets/scripts/editCdish.php');

                const dishNameInput = document.createElement('input');
                dishNameInput.setAttribute('type', 'hidden');
                dishNameInput.setAttribute('name', 'dishName');
                dishNameInput.setAttribute('value', currentdishName);

                const newPriceInput = document.createElement('input');
                newPriceInput.setAttribute('type', 'hidden');
                newPriceInput.setAttribute('name', 'newPrice');
                newPriceInput.setAttribute('value', newPrice);

                form.appendChild(dishNameInput);
                form.appendChild(newPriceInput);

                document.body.appendChild(form);

                form.submit();
            }
            // Edit Function End






    </script>

</html>