<?php
$departementManagers = getAllDeptWithCurrnetManager();
?>
<section class="container">
    <h1>liste des departements</h1>
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
                        <a href="modele.php?page=employees.php&&dept_no=<?= $deptManag["dept_no"] ?>">
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