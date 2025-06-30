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
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="modele.php?page=departments.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="modele.php?page=search_emp.php">Search</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
            </div>
        </nav>
    </header>
    <main class="pt-3">

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