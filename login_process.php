<?php
include_once 'db_connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to select the user based on email and plaintext password
    $stmt = $pdo->prepare("SELECT * FROM accounts WHERE email = :email AND password = :password");

    // Bind the parameters
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Execute the query
    $stmt->execute();

    // Fetch the user record
    $account = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if account exists
    if ($account) {
        // Account exists, set session variable and redirect
        $_SESSION['account_id'] = $account['account_ID']; // Make sure to use the correct column name
        if ($account['isAdmin'] == 1) {
            // Redirect to admin dashboard
            header("Location: admindashboard.php");
            exit();
        } else {
            // Redirect to user dashboard
            header("Location: userdashboard.php");
            exit();
        }
    } else {
        // Account does not exist or password is incorrect
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: login.php");
        exit();
    }
}
?>
