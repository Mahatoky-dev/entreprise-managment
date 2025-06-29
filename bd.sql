-- Recuperation de toute les depatements avec le nom du manager
-- dans une entreprise , le manager son des employees d'ou l'existance de la table dept manager qui a pour role de selectionné le managers d'un departement dans un interval de temp determinné
CREATE VIEW view_dept_full_manager AS
SELECT departments.dept_no ,departments.dept_name , employees.first_name 
    As manager_frist_name ,employees.last_name As manager_last_name ,
    employees.emp_no As manager_emp_no ,
    dept_manager.from_date As manager_from_date ,dept_manager.to_date as manager_to_date
FROM departments
JOIN dept_manager ON departments.dept_no = dept_manager.dept_no 
JOIN employees ON dept_manager.emp_no = employees.emp_no;

-- recuperation des manages des departements current
SELECT * 
FROM view_dept_full_manager 
WHERE manager_to_date > NOW();
-- Recuperation des employeés d'un departement donné '%s -> dept_no'
SELECT *
    FROM 
    employees JOIN
    dept_manager ON employees.emp_no = dept_manager.emp_no
WHERE 
    dept_manager.dept_no = '%s';

-- creation d'e la vus qui recupeere la liste des employeé avec titre d'un departement
SELECT * 
FROM dept_emp 
JOIN employees ON employees.emp_no = dept_emp.emp_no
JOIN titles ON employees.emp_no = titles.emp_no
WHERE dept_emp.dept_no ='%s';

-- recuperatio des informations des employes  %s -> emp_no
SELECT *  
FROM employees 
WHERE employees.emp_no = '%s';

-- recuperation de l'historique de ses salaires   %s -> emp_no
SELECT *
FROM salaries
WHERE salaries.emp_no = '%s'
ORDER BY salaries.from_date DESC;
-- recuperation des emploees du personne
SELECT *  
FROM titles
WHERE titles.emp_no = '%s'
ORDER BY titles.from_date DESC;

--selecitonné une portion d'employees dnans une departement precise
SELECT employees.emp_no,employees.first_name,dept_emp.dept_no
FROM employees
JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
WHERE dept_emp.dept_no = 'd001' AND dept_emp.to_date > NOW() LIMIT 0 , 10;

-- recuperer les employees avec des conditions precise
SELECT 
    employees.emp_no,
    employees.last_name,
    employees.first_name,
    TIMESTAMPDIFF(YEAR, employees.birth_date,NOW()) as age,
FROM employees 
JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
WHERE 
    dept_emp.dept_no = 'd009' 
    AND (employees.first_name LIKE '%s' OR employees.last_name LIKE '%s')
    AND age BETWEEN 20 , 60; 