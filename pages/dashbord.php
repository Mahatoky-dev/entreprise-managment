<?php
$nbFemme = getNbFemme();
$nbHomme = getnbHomme();
$titlesSalaryAvg = getTitlesSalaryAvg();
?>
<section class="dashbord">
    <article class="info-employees">
        <h2>Homme : <?= $nbHomme ?> </h2>
        <h2>Femme : <?= $nbFemme ?></h2>
    </article>
    <article class="info-salary">
        <h2>info-salary : </h2>
        <ul>
            <?php foreach($titlesSalaryAvg as $titleSalAvg) { ?>
            <li> <?= $titleSalAvg["title"] ?> : <?= $titleSalAvg["salary_avg"] ?> </li>
            <?php } ?>
        </ul>
    </article>
</section>