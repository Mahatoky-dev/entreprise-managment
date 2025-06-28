<?php
include("../includes/fonctions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <!-- barre de navigation lateral -->
    <aside class="col-3 col-md-4" >
        <nav class="navBar">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Departments</a></li>
                <li><a href="">employees</a></li>
                <li><a href="">serch</a></li>
            </ul>
        </nav>
    </aside>
    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include($_GET["page"]);
        } else {
            echo "auccune page chargé";
        }
        ?>
    </main>
</body>

</html>