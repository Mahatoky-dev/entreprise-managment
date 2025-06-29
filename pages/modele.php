<?php
include("../includes/fonctions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex gap-3">
    <!-- barre de navigation lateral -->
    <aside class="col-3 col-md-2 rounded shadow-lg p-5 text-white">
        <ul class="nav flex-column text-center">
            <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="modele.php?page=departments.php">Department</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modele.php?page=search_emp.php">search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
    </aside>
    <main class="col- col-md-10">
        <section>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                include($_GET["page"]);
            } else {
                echo "auccune page chargé";
            }
            ?>
        </section>

    </main>
</body>

</html>