<?php
include("../includes/fonctions.php");
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $dept_no = $_GET["dept_no"];
}
$infoDept = getInfoDept($dept_no);
$employees = getEmployeesFromDepatement($dept_no);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <main class="container">
        <section class="info-dept">
            <h1><?= $infoDept["dept_name"] ?></h1>
        </section>
        <section class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Employees name</th>
                        <th scope="col">Titles </th>
                        <th scope="col">Hire date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td>
                                <?= $employee["first_name"] ?>
                                <?= $employee["last_name"] ?>
                            </td>
                            <td><?= $employee["title"] ?></td>
                            <td><?= $employee["hire_date"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>