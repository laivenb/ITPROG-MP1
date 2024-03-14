<?php
// Start session
session_start();

// Redirect to dashboard if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles/login.css">
</head>
<body>
    <div class="container">
        <form action="login_process.php" method="post" enctype="multipart/form-data">
            <img class="logo" id="logo" src="./assets/images/loginLogo.png"/>
            <div class="form-card login-card">
                <h1>LOGIN</h1>
                <?php
                // Display error message if login attempt failed
                if (isset($_SESSION['login_error'])) {
                    echo '<p style="color: red;">' . $_SESSION['login_error'] . '</p>';
                    unset($_SESSION['login_error']);
                }
                ?>
                <!-- Change input name from "username" to "email" -->
                <input type="email" class="form-control" name="email" placeholder="Email"> 
                <!-- Correct input name from "username" to "password" -->
                <input type="password" class="form-control" name="password" placeholder="Password"> 
                <button type="submit" class="btn-primary">SUBMIT</button> 
            </div>
        </form> 
    </div>
</body>
</html>
