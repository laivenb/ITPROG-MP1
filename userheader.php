<!-- Import Header Stylesheet -->
<link rel="stylesheet" href="assets/styles/header.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        session_start();
        if (isset($_SESSION['account_id'])) {
            // If user is logged in, display user profile dropdown
            ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                    <?php echo $_SESSION['email']; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="index.php">Logout</a></li>
                </ul>
            </li>
            <?php
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
    });
</script>
