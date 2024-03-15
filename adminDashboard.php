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
    <link rel="stylesheet" href="assets/styles/adminDashboard.css">
</head>

<body>
    <!-- Flight Display Start -->
        <div class="boxContainers">
            <div class="headerFlight">
                <div class="airportName">
                    <h1 class="HNAIA">(MNL) Ninoy Aquino International Airport Departures</h1>
                </div>
                <div class="headerDate">
                    <span class="rightDate">17-Mar-2024</span>
                </div>
            </div>
            <div class="flightHeaderContainers">
                <div><span>Flight</span></div>
                <div><span>Departure Time</span></div>
                <div><span>Arrival Time</span></div>
                <div><span>Destination</span></div>
            </div>
            <?php
            $xml = simplexml_load_file('./assets/xml/flights.xml');
            foreach ($xml->flight as $flight) {
                $flightNumber = $flight->flightNumber;
                $airline = $flight->airline;
                $departure = $flight->departure;
                $arrival = $flight->arrival;
                $code = $flight->code;
                $destination = $flight->destination;
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