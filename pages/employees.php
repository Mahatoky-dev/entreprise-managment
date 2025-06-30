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
    <section class="info-dept">
        <h1><?= $infoDept["dept_name"] ?></h1>
    </section>
    <section class="row gap-lg-3">
        <article class="card col-12 col-md-7">
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
            <div class="card-footer">
                <nav>
                    <ul>
                        <?php if ($precedent >= 0) { ?>
                            <li><a href="modele.php?page=employees.php&dept_no=<?= $dept_no ?>&debutSelect=<?= $precedent ?>">Precedent</a></li>
                        <?php } ?>
                        <li><a href="modele.php?page=employees.php&dept_no=<?= $dept_no ?>&debutSelect=<?= $suivant ?>">suivant</a></li>
                    </ul>
                </nav>
            </div>

        </article>
        <article class=" card other-info col-12 col-md-4 d-flex flex-column gap-4 p-3">
            <div class="card text-bg-primary mb-3  " style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card text-bg-primary mb-3 " style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </article>
    </section>
</section>

</body>

</html>