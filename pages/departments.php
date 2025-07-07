<?php
$departementManagers = getAllDeptWithCurrnetManager();
?>
<section class="p-3 d-flex flex-column justify-content-space-between mt-5">
    <article class="col-12">
        <header class="text-center ">
            <h1>liste des departements</h1>
        </header>
        <section class="p-3" >
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
                            <td>
                                <?= $deptManag["nb_employee"] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </article>
</section>