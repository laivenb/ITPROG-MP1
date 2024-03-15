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
    <link rel="stylesheet" href="assets/styles/adminOrder.css">
</head>

<body>
<!-- Flight Display Start -->
<div class="boxContainers">
    <div class="headerFlight">
        <div class="airportName">
            <h1 class="HNAIA">Order History</h1>
        </div>
        <div class="headerDate">
            <span class="rightDate">-</span>
        </div>
    </div>
    <div class="flightHeaderContainers">
        <div><span>Order ID</span></div>
        <div><span>Customer ID</span></div>
        <div><span>Main_ID</span></div>
        <div><span>Side_ID</span></div>
        <div><span>Drink_ID</span></div>
        <div><span>Combo_ID</span></div>
        <div><span>Flight #</span></div>
        <div><span>Order Date</span></div>
    </div>
    <?php
    $xml = simplexml_load_file('./assets/xml/orders.xml');
    foreach ($xml->order as $order) {
        $orderID = $order->order_ID;
        $customerID = $order->customer_ID;
        $mainID = $order->main_ID;
        $sideID = $order->side_ID;
        $drinkID = $order->drink_ID;
        $comboID = $order->combo_ID;
        $flightNo = $order->flight_no;
        $orderDate = $order->orderDate;
        ?>
        <div class="flightContainers">
            <div><span><?= $flightNumber ?><br><span class="addInfo"><?= $airline ?></span></span></div>
            <div><span><?= $departure ?></span></div>
            <div><span><?= $arrival ?></span></div>
            <div><span><?= $code ?><br><span class="addInfo"><?= $destination ?></span></span></div>
        </div>
    <?php } ?>
</div>
<!-- Flight Display End -->
</body>

</html>