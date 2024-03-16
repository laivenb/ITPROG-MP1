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
    <link rel="stylesheet" href="assets/styles/adminMembers.css">
</head>

<body>
    <div class="headerCore">
        <div class="CoreName">
            <h1 class="Hteam">Meet The Team</h1>
        </div>
    </div>
    <!-- Core Containers Page Start -->
    <div class="coreContainers">
        <?php
        // Sample data for cores and their roles with image URLs
        $cores = array(
            array('name' => 'Cayra Maxine Lee', 'role' => 'Project Manager', 'image' => './assets/images/coreMembers/cay_lee.png'),
            array('name' => 'Cymbeline Anne Lignes', 'role' => 'IT Analyst', 'image' => './assets/images/coreMembers/cymbe_lignes.png'),
            array('name' => 'Marc Jethro Baroja', 'role' => 'Project Engineer', 'image' => './assets/images/coreMembers/jethro_baroja.png'),
            array('name' => 'Marius Enrico Manaloto', 'role' => 'Product Manager', 'image' => './assets/images/coreMembers/marius_manaloto.png'),
            array('name' => 'Laiven Bañez', 'role' => 'Head Developer', 'image' => './assets/images/coreMembers/laiven_banez.png'),
            array('name' => 'Jean Mikael Mariano', 'role' => 'Head Developer', 'image' => './assets/images/coreMembers/jean_mariano.png'),
            array('name' => 'Josheart Adrienne', 'role' => 'Tester', 'image' => './assets/images/coreMembers/josheart_adrienne.png')
        );

        // Loop through the cores array and create containers for each core
        foreach ($cores as $core) {
            echo '<div class="individualCore">';
            echo '<img src="' . $core['image'] . '" alt="' . $core['name'] . '">';
            echo '<div class="name">' . $core['name'] . '</div>';
            echo '<div class="role">' . $core['role'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <!-- Core Containers Page End -->
</body>

</html>