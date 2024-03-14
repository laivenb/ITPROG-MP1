<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Meal Orders</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
$xml = simplexml_load_file("airlinemeal.xml");

if ($xml) {
    // Display Accounts Table
    echo "<h2>Accounts</h2>";
    echo "<table>";
    echo "<tr><th>Account ID</th><th>Customer ID</th><th>isAdmin</th><th>Username</th><th>Email</th><th>Password</th></tr>";
    foreach ($xml->accounts->account as $account) {
        echo "<tr>";
        echo "<td>" . $account->account_ID . "</td>";
        echo "<td>" . $account->customer_ID . "</td>";
        echo "<td>" . $account->isAdmin . "</td>";
        echo "<td>" . $account->username . "</td>";
        echo "<td>" . $account->email . "</td>";
        $hashed_password = password_hash($account->password, PASSWORD_DEFAULT);
        echo "<td>" . $hashed_password . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Customers Table
    echo "<h2>Customers</h2>";
    echo "<table>";
    echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Contact Number</th></tr>";
    foreach ($xml->customers->customer as $customer) {
        echo "<tr>";
        echo "<td>" . $customer->customer_ID . "</td>";
        echo "<td>" . $customer->customer_Name . "</td>";
        echo "<td>" . $customer->contact_Number . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Main Dishes Table
    echo "<h2>Main Dishes</h2>";
    echo "<table>";
    echo "<tr><th>Dish ID</th><th>Dish Name</th><th>Price</th></tr>";
    foreach ($xml->maindishes->maindish as $maindish) {
        echo "<tr>";
        echo "<td>" . $maindish->dish_ID . "</td>";
        echo "<td>" . $maindish->dish_name . "</td>";
        echo "<td>" . $maindish->price . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Side Dishes Table
    echo "<h2>Side Dishes</h2>";
    echo "<table>";
    echo "<tr><th>Side ID</th><th>Side Name</th><th>Price</th></tr>";
    foreach ($xml->sidedishes->sidedish as $sidedish) {
        echo "<tr>";
        echo "<td>" . $sidedish->side_ID . "</td>";
        echo "<td>" . $sidedish->side_name . "</td>";
        echo "<td>" . $sidedish->price . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Drinks Table
    echo "<h2>Drinks</h2>";
    echo "<table>";
    echo "<tr><th>Drink ID</th><th>Drink Name</th><th>Price</th></tr>";
    foreach ($xml->drinks->drink as $drink) {
        echo "<tr>";
        echo "<td>" . $drink->drink_ID . "</td>";
        echo "<td>" . $drink->drink_name . "</td>";
        echo "<td>" . $drink->price . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Orders Table
    echo "<h2>Orders</h2>";
    echo "<table>";
    echo "<tr><th>Order ID</th><th>Customer ID</th><th>Main Dish ID</th><th>Side Dish ID</th><th>Drink ID</th><th>Combo ID</th><th>Flight Number</th><th>Order Date</th></tr>";
    foreach ($xml->orders->order as $order) {
        echo "<tr>";
        echo "<td>" . $order->order_ID . "</td>";
        echo "<td>" . $order->customer_ID . "</td>";
        echo "<td>" . $order->main_ID . "</td>";
        echo "<td>" . $order->side_ID . "</td>";
        echo "<td>" . $order->drink_ID . "</td>";
        echo "<td>" . $order->combo_ID . "</td>";
        echo "<td>" . $order->flight_no . "</td>";
        echo "<td>" . $order->orderDate . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Combos Table
    echo "<h2>Combos</h2>";
    echo "<table>";
    echo "<tr><th>Combo ID</th><th>Combo Name</th><th>Price</th></tr>";
    foreach ($xml->combos->combo as $combo) {
        echo "<tr>";
        echo "<td>" . $combo->combo_ID . "</td>";
        echo "<td>" . $combo->combo_Name . "</td>";
        echo "<td>" . $combo->price . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Transactions Table
    echo "<h2>Transactions</h2>";
    echo "<table>";
    echo "<tr><th>Transaction ID</th><th>Order ID</th><th>Total Price</th><th>Transaction Date</th><th>Is Paid</th></tr>";
    foreach ($xml->transactions->transaction as $transaction) {
        echo "<tr>";
        echo "<td>" . $transaction->transaction_ID . "</td>";
        echo "<td>" . $transaction->order_ID . "</td>";
        echo "<td>" . $transaction->total_price . "</td>";
        echo "<td>" . $transaction->transaction_date . "</td>";
        echo "<td>" . $transaction->isPaid . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display Discounted Order Items Table
    echo "<h2>Discounted Order Items</h2>";
    echo "<table>";
    echo "<tr><th>Discounted ID</th><th>Order ID</th><th>Discount Amount</th><th>Is PWD</th></tr>";
    foreach ($xml->discountedorderitems->discountedorderitem as $discounteditem) {
        echo "<tr>";
        echo "<td>" . $discounteditem->discounted_ID . "</td>";
        echo "<td>" . $discounteditem->order_ID . "</td>";
        echo "<td>" . $discounteditem->discount_amount . "</td>";
        echo "<td>" . $discounteditem->isPWD . "</td>";
        echo "</tr>";
    }

    // Repeat the same process for other tables (Side Dishes, Drinks, Orders, Combos, Transactions, Discounted Order Items)
} else {
    echo "Failed to load XML file.";
}
?>

</body>
</html>
