<?php
require("connexion.php");

// recuperation de la liste des departements  avec les nom des manager
function getAllDepart()
{
    $sql = "SELECT * FROM departments ;";
    $request = mysqli_query(bddConnect(), $sql);
    while ($depart = mysqli_fetch_assoc($request)) {
        $departs[] = $depart;
    }
    return $departs;
}

//fonction pour recuperer les depatements et le manager current
function getAllDeptWithCurrnetManager()
{
    $sql = "SELECT * 
                FROM view_dept_full_manager d_m
                JOIN v_employees_count e_c ON d_m.dept_no = e_c.dept_no
                WHERE manager_to_date > NOW();";

    $request = mysqli_query(bddConnect(), $sql);
    while ($deptAndManager = mysqli_fetch_assoc($request)) {
        $deptAndManagers[] = $deptAndManager;
    }
    return $deptAndManagers;
}


//recuperer la liste des employers d'une departement precises
function getEmpDept($dept_no, $debut, $fin)
{
    $sql = "SELECT  
                employees.emp_no,
                employees.first_name,
                employees.last_name,
                employees.gender,
                dept_emp.dept_no
            FROM employees
            JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 

            WHERE dept_emp.dept_no = '%s' AND dept_emp.to_date > NOW() LIMIT %s , %s;";

    $sql = sprintf($sql, $dept_no, $debut, $fin);
    $request = mysqli_query(bddConnect(), $sql);


    while ($empDept = mysqli_fetch_assoc($request)) {
        $empDepts[] = $empDept;
    }
    return $empDepts;
}

function getInfoDept($dept_no)
{
    $sql = "SELECT * FROM departments WHERE dept_no='%s';";
    $sql = sprintf($sql, $dept_no);
    $request = mysqli_query(bddConnect(), $sql);
    $deptInfo = mysqli_fetch_assoc($request);
    return $deptInfo;
}

function getInfoEmploye($emp_no)
{
    $sql = "SELECT 
                employees.first_name,
                 employees.last_name,
                 employees.hire_date,
                 TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) AS age
            FROM employees
            WHERE employees.emp_no = '%s';";
    $sql = sprintf($sql, $emp_no);
    $request = mysqli_query(bddConnect(), $sql);
    $deptInfo = mysqli_fetch_assoc($request);
    return $deptInfo;
}

//
function getTilteEmp($emp_no)
{
    $sql = "SELECT *  
            FROM titles
            WHERE titles.emp_no = '%s'
            ORDER BY titles.from_date DESC;";
    $sql = sprintf($sql, $emp_no);
    $request = mysqli_query(bddConnect(), $sql);
    while ($title = mysqli_fetch_assoc($request)) {
        $titles[] = $title;
    }
    return $titles;
}

//prendre l'istorique de salaire d'un employer
function getSalaryEmp($emp_no)
{
    $sql = "SELECT *
            FROM salaries
            WHERE salaries.emp_no = '%s'
            ORDER BY salaries.from_date DESC;";
    $sql = sprintf($sql, $emp_no);
    $request = mysqli_query(bddConnect(), $sql);
    while ($salarie = mysqli_fetch_assoc($request)) {
        $salaries[] = $salarie;
    }
    return $salaries;
}

function getIntervalDate($debut, $fin)
{
    $timestampDebut = strtotime($debut);
    $timestampFin   = strtotime($fin);
    $timestampNow   = time();

    $dateDebut = date("d/m/Y", $timestampDebut);

    // Si la date de fin est dans le futur
    if ($timestampFin > $timestampNow) {
        $dateFin = "now";
    } else {
        $dateFin = date("d/m/Y", $timestampFin);
    }

    return $dateDebut . " to " . $dateFin;
}

function getEmployeesFor($dept_no, $nameEmp, $ageMin, $ageMax , $page , $nbLine)
{
    $empDeb = ($page - 1) * $nbLine;
    $sql = "SELECT 
    employees.emp_no,
    employees.last_name,
    employees.first_name,
    employees.gender
    FROM employees 
    JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
    WHERE 
        dept_emp.dept_no = '%s' 
        AND (employees.first_name LIKE '%s' OR employees.last_name LIKE '%s')
        AND (TIMESTAMPDIFF(YEAR, employees.birth_date,NOW()) BETWEEN %s AND %s)
    LIMIT %s , %s;";
    $nameEmpInName = "%" . $nameEmp . "%";
    $sql = sprintf($sql, $dept_no, $nameEmpInName, $nameEmpInName, $ageMin, $ageMax,$empDeb,$nbLine);
    $request = mysqli_query(bddConnect(), $sql);
    $employees = array();
    while ($employe = mysqli_fetch_assoc($request)) {
        $employees[] = $employe;
    }
    return $employees;
}