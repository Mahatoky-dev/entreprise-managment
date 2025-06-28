<section class="container" >
    <form action="./modele.php" method="get">
        <input type="hidden" name="page" value="search_emp.php">
        <select name="dept" id="">
            <option value="">departement 1</option>
            <option value="">departement 2</option>
            <option value="">departement 3</option>
        </select>
        <input type="text" name="" id="" placeholder="Nom employees">
        <input type="number" name="" id="">
        <input type="number" name="" id="">
        <input type="submit" value="Search">
    </form>
</section>
<section class="container">
    <article class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Employees name</th>
                    <th scope="col">Titles</th>
                </tr>
            </thead>
            <tbody>
                <!-- liste des employees -->
                <tr>
                    <td>Nom de l'employees</td>
                    <td>Title de l'employees</td>
                </tr>
                <tr>
                    <td>Nom de l'employees</td>
                    <td>Title de l'employees</td>
                </tr>
            </tbody>
        </table>
    </article>
    <!-- valeur si il n'y a pas d'employé valide -->
    <article>
        <h2>Recherché votre employeeé </h2>
    </article>
</section>