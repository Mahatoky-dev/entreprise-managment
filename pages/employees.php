<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $dept_no = $_GET["dept_no"];
}
$infoDept = getInfoDept($dept_no);
$current = isset($_GET["debutSelect"]) ? $_GET["debutSelect"] : 0;
$precedent = $current - 10;
$suivant = $current + 10;
$employees = getEmpDept($dept_no, $current, 10);
?>
<section class="container">
    <article class="info-dept">
        <h1><?= $infoDept["dept_name"] ?></h1>
    </article>
    <article class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Employees name</th>
                    <th scope="col">Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee) { ?>
                    <tr>
                        <td>
                            <a href="modele.php?page=fiche.php&&emp_no=
                            <?= $employee["emp_no"] ?>">
                                <?= $employee["first_name"] ?>
                                <?= $employee["last_name"] ?>
                            </a>
                        </td>
                        <td><?= $employee["gender"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav>
            <ul>
                <?php if ($precedent >= 0) { ?>
                    <li><a href="modele.php?page=employees.php&dept_no=<?= $dept_no ?>&debutSelect=<?= $precedent ?>">Precedent</a></li>
                <?php } ?>
                <li><a href="modele.php?page=employees.php&dept_no=<?= $dept_no ?>&debutSelect=<?= $suivant ?>">suivant</a></li>
            </ul>
        </nav>
    </article>
</section>
</body>

</html>