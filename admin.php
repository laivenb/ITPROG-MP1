<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkyCuisine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/admin.css">
</head>

<body>
        <!-- Required Elements per Page Start -->
        <?php include './assets/scripts/frameworkLib.php'; ?>        <!-- Framework PHP Script Reference-->
        <!-- Required Elements per Page End -->

        <!-- SideBar Start -->
        <div class="sideBar">
            <!-- User Profile Start -->
            <div class="user">
                <img src="./assets/images/admin/anonUser.png" alt="" class="userProImg">
                <div class="nameDisplay">
                    <h2 class="HnameDisplay">Admin Admin</h2>
                    <p>Project Manager</p>
                </div>
            </div>
            <!-- User Profile End -->
            <!-- Side Bar List Start -->
            <ul class="sideBarList">
                <li><img src="./assets/images/admin/dashboard.png" alt=""><p>Dashboard</p></li>
                <li><img src="./assets/images/admin/item.png" alt=""><p>Manage Item</p></li>
                <li><img src="./assets/images/admin/record.png" alt=""><p>Order Management</p></li>
                <li><img src="./assets/images/admin/core.png" alt=""><p>Core Members</p></li>
            </ul>
            <!-- Side Bar List End -->
            <!-- Side Bar Log Out Start -->
            <ul class="logOutList">
                <li><img src="./assets/images/admin/logOut.png" alt=""><p>Log Out</p></li>
            </ul>
            <!-- Side Bar Log Out End -->
        </div>
        <!-- SideBar End -->

        <!-- Welcome Logo Start -->
        <div class="adminBanner">
            <img src="./assets/images/admin/logoBlack.png" alt="" class="logoBlackImg">
        </div>
        <!-- Welcome Logo End -->
</body>
</html>