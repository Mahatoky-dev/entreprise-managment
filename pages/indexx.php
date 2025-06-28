<?php
include("../includes/fonctions.php");

//prendre la liste des departements 
$departementManagers = getAllDeptWithCurrnetManager();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departement</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <main>
        <section class="depatrements-managers">
            <h1>liste des departements</h1>
            <!-- affiché la liste des depatements -->
            <section class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Departement name</th>
                            <th scope="col">manager</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($departementManagers as $deptManag) { ?>
                            <tr>
                                <td>
                                    <a href="employees.php?dept_no=<?= $deptManag["dept_no"] ?>">
                                        <?= $deptManag["dept_name"] ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $deptManag["manager_frist_name"] ?>
                                    <?= $deptManag["manager_last_name"] ?>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </section>


        </section>
    </main>
</body>

</html>