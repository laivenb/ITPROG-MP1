<?php
include_once 'db_connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM accounts WHERE email = :email");

    $stmt->bindParam(':email', $email);

    $stmt->execute();

    $account = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($account && password_verify($password, $account['password'])) {
        // Password is correct
        $_SESSION['account_id'] = $account['account_id'];
        if ($account['isAdmin'] == 1) {
            // Redirect to admin dashboard
            header("Location: admindashboard.php");
        } else {
            // Redirect to user dashboard
            header("Location: userdashboard.php");
        }
        exit();
    } else {
        // Password is incorrect or account does not exist
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: login.php");
        exit();
    }
}
?>
