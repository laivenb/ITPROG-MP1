<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Header</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/header.css">
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
            <?php
            if (isset($_SESSION['account_id'])) {
                // If user is logged in, display profile dropdown
                if (isset($_SESSION['email'])) {
                    ?>
                    <li class="dropdown">
                        <div class="profile-hover">
                            <a href="#" class="profile-toggle"><?php echo $_SESSION['email']; ?></a>
                            <div class="profile-content">
                                <p>Email: <?php echo $_SESSION['email']; ?></p>
                                <a href="logout.php">Logout</a>
                            </div>
                        </div>
                    </li>
                    <?php
                } else {
                    // Handle case where email is not set in session
                    ?>
                    <li><a href="logout.php">LOGOUT</a></li>
                    <?php
                }
            } else {
                // If user is not logged in, display login button
                ?>
                <li><a href="login.php">LOGIN</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <!-- Navigation Bar End-->
    <script>
        // Add JavaScript to handle dropdown toggle behavior
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownToggle = document.querySelector('.dropdown-toggle');

            dropdownToggle.addEventListener('click', function() {
                var dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            });

            // Close dropdown menu when clicking outside
            window.addEventListener('click', function(event) {
                var dropdownMenu = document.querySelector('.dropdown-menu');
                if (dropdownMenu.classList.contains('show') && !event.target.closest('.dropdown')) {
                    dropdownMenu.classList.remove('show');
                }
            });

            // Add hover functionality for profile
            var profileToggle = document.querySelector('.profile-toggle');

            profileToggle.addEventListener('mouseover', function() {
                var profileContent = this.nextElementSibling;
                profileContent.style.display = 'block';
            });

            profileToggle.addEventListener('mouseout', function() {
                var profileContent = this.nextElementSibling;
                profileContent.style.display = 'none';
            });
        });
    </script>
</body>
</html>
