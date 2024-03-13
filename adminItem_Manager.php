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
                    <!-- Add Modal Start-->
                    <span class="addSpanBtn"><button type="button" class="addBtn" onclick="addMainFunc()">+  ADD</button></span>
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
                $pdo = new PDO($dsn, $dbusername, $dbpassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query("SELECT * FROM maindish");

                echo "<div class='mainInfoContainers'>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imageSrc = "./assets/images/admin/".$row['dish_ID'].".jpg";
                    echo "<div><img src='".$imageSrc."' alt='Image' width='50' height='50'></div>";
                    echo "<div><span>".$row['dish_name']."</span></div>";
                    echo "<div><span>".$row['price']."</span></div>";
                    echo "<div><span><button type='button' class='btn btn-secondary'>Edit</button></span></div>";
                    echo "<div><span><button type='button' class='btn btn-danger'>Delete</button></span></div>";
                }
                echo "</div>";

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
            <!-- Main Dish Display Start -->
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
                $pdo = new PDO($dsn, $dbusername, $dbpassword);
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
                $pdo = new PDO($dsn, $dbusername, $dbpassword);
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
                $pdo = new PDO($dsn, $dbusername, $dbpassword);
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

</html>