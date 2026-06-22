## inde.php

## search.php
    ?? ''
    $results   = $submitted ? search_employees($dept_no, $name, $age_min, $age_max) : array();
    <h2><?= count($results) ?> résultat(s)<?= count($results) === 200 ? ' (limité à 200)' : ''></h2>
## become_manager.php
    <?= htmlspecialchars($error) ?>
    urlencode
## change_dept.php

## dept_form.php

## emp_form.php
    $existing   = $emp_no_url !== '' ? get_one_employee($emp_no_url) : null;
## employees.php
    ceil()
## fiche.php
    number_format($s['salary'], 0, ',', ' ')
## stats.php

## functions.php
    get_all_departments() (ligne 33)
CONCAT 

    get_employees_by_department() (ligne 223)
INNER JOIN

    get_one_employee($emp_no) (ligne 259)
LEFT JOIN

    get_longest_title($emp_no) (ligne 281)
DATEDIFF(IF(to_date = '9999-01-01', CURDATE(), to_date), from_date) AS duree_jours

    search_employees($dept_no, $name, $age_min, $age_max) (ligne 329)
TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE())

    search_employees (ligne 322)
$where = empty($conditions) ? '1=1' : implode(' AND ', $conditions)


