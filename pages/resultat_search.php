 <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["dept_no"])) {
        $dept_no = isset($_GET["dept_no"]) ? $_GET["dept_no"] : "";
        $nameEmp =  isset($_GET["name_emp"]) ? $_GET["name_emp"] : "";
        $ageMin =  isset($_GET["min"]) ? $_GET["min"] : "";
        $ageMax =  isset($_GET["max"]) ? $_GET["max"] : "";

        $currentDebEmp = isset($_GET["debutSelect"]) ? $_GET["debutSelect"] : 0;
        $precedent = $currentDebEmp - 10;
        $suivant = $currentDebEmp + 10;

        $precedentExiste = $precedent >= 0;
        $suivantExiste = count(getEmployeesFor($dept_no, $nameEmp, $ageMin, $ageMax, $suivant, 1)) != 0;

        $employees = getEmployeesFor($dept_no, $nameEmp, $ageMin, $ageMax, $currentDebEmp, 10);
    }
    ?>
 <!-- resulat de la recherche s'il est faite  -->
 <section class="container">
     <?php if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["dept_no"])) { ?>
         <article class="container resulat">
             <table class="table">
                 <thead>
                     <tr>
                         <th scope="col">Employees name</th>
                         <th scope="col">Gender</th>
                     </tr>
                 </thead>
                 <tbody>
                     <!-- liste des employees -->
                     <?php foreach ($employees as $employee) { ?>
                         <tr>
                             <td>
                                 <a href="modele.php?page=fiche.php&&emp_no=
                                 <?= $employee["emp_no"] ?>">
                                     <?= $employee["first_name"] ?>
                                     <?= $employee["last_name"] ?>
                                 </a>
                             </td>
                             <td>
                                 <?= $employee["gender"] ?>
                             </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
             <div class="nav">
                 <ul>
                     <?php if ($precedentExiste) {  ?>
                         <li>
                             <a href="modele.php?page=search_emp.php&debutSelect=<?= $precedent ?>&dept_no=<?= $dept_no ?>&name_emp=<?= $nameEmp ?>&min=<?= $ageMin ?>&max=<?= $ageMax ?>">
                                 precedent</a>
                         </li>
                     <?php } ?>

                     <?php if ($suivantExiste) {  ?>
                         <li><a href="modele.php?page=search_emp.php&&debutSelect=<?= $suivant ?>&dept_no=<?= $dept_no ?>&name_emp=<?= $nameEmp ?>&min=<?= $ageMin ?>&max=<?= $ageMax ?>">
                                 suivant</a>
                         </li>
                     <?php } ?>
                 </ul>
             </div>
         </article>
     <?php } else { ?>
         <article class="defaut-value">
             <h2>Recherché votre employeeé </h2>
         </article>
     <?php } ?>

     <!-- valeur si il n'y a pas d'employé valide -->

 </section>