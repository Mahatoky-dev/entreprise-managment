<?php
//on a pas vraiment besoin de cette controleur on peut juste liée index et employees directement
if($_SERVER["REQUEST_METHOD"] === "GET") {
    
    $dept_no = $_GET["dept_no"];

    header("Location: ../pages/employees.php?dept_no=$dept_no");
}
?>
<a href="../pages/employees.php"></a>