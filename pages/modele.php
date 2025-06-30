<?php
include("../includes/fonctions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.css">
</head>

<body class="row">
    <!-- barre de navigation lateral -->
    <header class="row position-fix">
        <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <i class="fas fa-bars fa-2x"></i>
        </a>
    </header>
    <!-- teste css -->


    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">navigation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
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
        </div>
    </div>
    <main>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include($_GET["page"]);
        } else {
            echo "auccune page chargé";
        }
        ?>


    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>