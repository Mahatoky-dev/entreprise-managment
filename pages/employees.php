<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $dept_no = $_GET["dept_no"];
}
$infoDept = getInfoDept($dept_no);
$employees = getEmployeesFromDepatement($dept_no);
?>
<section class="container" >
    <article class="info-dept">
        <h1><?= $infoDept["dept_name"] ?></h1>
    </article>
    <article class="container">
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
    </article>
</section>
</body>

</html>