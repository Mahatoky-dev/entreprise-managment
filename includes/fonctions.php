<?php
require("connexion.php");

// recuperation de la liste des departements  avec les nom des manager
function getAllDepart() {
    $sql = "SELECT * FROM departments ;";
    $request = mysqli_query(bddConnect(), $sql);
    while ($depart = mysqli_fetch_assoc($request)) {
        $departs[] = $depart;
    }
    return $departs;
}

//fonction pour recuperer les depatements et le manager current
function getAllDeptWithCurrnetManager() {
    $sql = "SELECT * 
                FROM view_dept_full_manager 
                WHERE manager_to_date > NOW();";

    $request = mysqli_query(bddConnect(), $sql);
    while ($deptAndManager = mysqli_fetch_assoc($request)) {
        $deptAndManagers[] = $deptAndManager;
    }
    return $deptAndManagers;
}

//recuperer la liste des employers d'une departement precises
function getEmployeesFromDepatement($dept_no) {
    $sql = "SELECT employees.first_name,employees.last_name ,employees.hire_date,titles.title
            FROM employees 
            JOIN titles ON employees.emp_no = titles.emp_no
            JOIN dept_emp ON employees.emp_no = dept_emp.emp_no
            WHERE dept_emp.dept_no ='%s';";
    $sql = sprintf($sql, $dept_no);
    $request = mysqli_query(bddConnect(),$sql);

    while ($employe = mysqli_fetch_assoc($request)) {
        $employes[] = $employe;
    }
    return $employes;
}

function getInfoDept($dept_no) {
    $sql = "SELECT * FROM departments WHERE dept_no='%s';";
    $sql = sprintf($sql, $dept_no);
    $request = mysqli_query(bddConnect(),$sql);
    $deptInfo = mysqli_fetch_assoc($request);
    return $deptInfo;
}

function getInfoEmploye($emp_no) {
    $sql = "SELECT *  
            FROM employees 
            WHERE employees.emp_no = '%s';";
    $sql = sprintf($sql, $emp_no);
    $request = mysqli_query(bddConnect(),$sql);
    $deptInfo = mysqli_fetch_assoc($request);
    return $deptInfo;
}