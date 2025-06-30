<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $emp_no = $_GET["emp_no"];
    $infoEmploye = getInfoEmploye($emp_no);
    $titles = getTilteEmp($emp_no);
    $salaries = getSalaryEmp($emp_no);
}
?>
<section class="info-eployees mt-5">
    <h2><?= $infoEmploye["first_name"] ?></h2>
    <p><?= $infoEmploye["age"] ?> ans</p>
    <p> employees depuis <?= $infoEmploye["hire_date"] ?></p>
</section>
<section class="history">
    <article class="titles-history">
        <h2>Titles</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titles</th>
                    <th scope="col">date</th>
                </tr>
            </thead>
            <tbody>
                <!-- liste des employees -->
                <?php foreach ($titles as $title) { ?>
                    <tr>
                        <td><?= $title["title"] ?></td>
                        <td><?= getIntervalDate($title["from_date"],$title["to_date"]) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </article>
    <article class="salary-history">
        <h2>Salaries</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">salary</th>
                    <th scope="col">date</th>
                </tr>
            </thead>
            <tbody>
                <!-- liste des employees -->
                <?php foreach ($salaries as $salarie) { ?>
                    <tr>
                        <td><?= $salarie["salary"] ?></td>
                        <td><?= getIntervalDate($salarie["from_date"],$salarie["to_date"]) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </article>
</section>