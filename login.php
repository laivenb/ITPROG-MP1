<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $xml = simplexml_load_file("airlinemeal.xml");
        $account = $xml->xpath("//account[email='{$email}' and password='{$password}']");
        
        if (!empty($account)) {
            $isAdmin = (int)$account[0]->isAdmin;
            $customer_ID = (int)$account[0]->customer_ID;
            $_SESSION['email'] = $email;
            $_SESSION['customer_ID'] = $customer_ID;
            
            if ($isAdmin == 1) {
                header("Location: admindashboard.php"); //Change this into admindashboard
                exit();
            } else {
                header("Location: userdashboard.php"); //changethisinto userdashboard
                exit();
            }
        } else {
            // If credentials are incorrect, display an error message
            $error = "Invalid email or password";
        }
    } else {
        // If email or password is empty, display an error message
        $error = "Please provide both email and password";
    }
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
        <form action="#" enctype="multipart/form-data">
            <img class="logo" id="logo" src="./assets/images/loginLogo.png"/>
            <div class="form-card login-card">
                <form action="login_process.php" method="post">
                    <h1>LOGIN</h1>
                    <input type="text" class="form-control" placeholder="username"> 
                    <input type="password" class="form-control" placeholder="password"> 
                    <button type="submit" class="btn-primary">SUBMIT</button> 
                </form>
            </div>
        </form> 
    </div>

</body>
</html>
