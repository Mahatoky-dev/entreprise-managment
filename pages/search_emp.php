<?php
//recuperation des different departement
$departments = getAllDepart();


?>
<section class="container">
    <form action="./modele.php" method="get">
        <input type="hidden" name="page" value="search_emp.php">
        <select name="dept_no" id="">
            <?php foreach ($departments as $department) { ?>
                <option value="<?= $department["dept_no"] ?>">
                    <?= $department["dept_name"] ?>
                </option>
            <?php } ?>
        </select>
        <input type="text" name="name_emp" id="" placeholder="Gregoire">
        <input type="number" name="min" id="" value="<?= $ageMin ?>" min="18" max="100" >
        <input type="number" name="max" id="" value="<?= $ageMax ?>" min="18" max="100">
        <input type="submit" value="Search">
    </form>
</section>

<!-- resulat de la recherche s'il est faite  -->
<section class="container">
    <?php include("./resultat_search.php") ?>
</section>