<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/styles/register.css">
</head>
<body>
    <?php $pdo = require __DIR__ . "./assets/scripts/dbh.inc.php"?>

    <div class="container">
        <form action="#" enctype="multipart/form-data">
            <img class="logo" id="logo" src="./assets/images/loginLogo.png"/>
            <div class="form-card login-card">
                <form action="login_process.php" method="post">
                    <h1>REGISTER</h1>
                    <input type="text" class="form-control" placeholder="username"> 
                    <input type="text" class="form-control" placeholder="email"> 
                    <input type="password" class="form-control" placeholder="password"> 
                    <button type="submit" class="btn-primary">SUBMIT</button> 
                </form>
            </div>
        </form> 
    </div>

</body>
</html>
