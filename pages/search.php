<?php
    include('../inc/functions.php');

    $departments = get_all_departments();

    // Récupération des critères (?? '' évite le warning si le champ est absent)
    $dept_no = $_GET['dept_no'] ?? '';
    $name    = $_GET['name']    ?? '';
    $age_min = $_GET['age_min'] ?? '';
    $age_max = $_GET['age_max'] ?? '';

    // On ne lance la recherche que si le formulaire a été soumis
    $submitted = isset($_GET['dept_no']);
    $results   = $submitted ? search_employees($dept_no, $name, $age_min, $age_max) : array();
?>
<html>
    <head>
        <title>Recherche d'employés</title>
        <link rel="stylesheet" href="../design/theme-dark/style.css">
    </head>
    <nav class="navbar">
        <p><a href="index.php">&larr; Retour aux départements</a></p>
    </nav>
    <body>
<div class="container">
    <div class="card">
        <h1>Recherche d'employés</h1>
    
        <form class ="form-inline" method="get" action="search.php">
            <div class="form-group">
                <label for="dept">Département :</label>
                <select name="dept_no">
                    <option value="">— Tous —</option>
                    <?php foreach ($departments as $d) { ?>
                        <option value="<?= $d['dept_no'] ?>" <?= $dept_no === $d['dept_no'] ? 'selected' : '' ?>>
                            <?= $d['dept_name'] ?>
                        </option>
                    <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label for="name">Nom de l'employé :</label>
                <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
            </div>
            <div class="form-group">
                <label for="age_min">Âge min : </label>
                <input type="number" name="age_min" value="<?= htmlspecialchars($age_min) ?>">
            </div>
            <div class="form-group">
                <label for="age_max">Âge max : </label>
                <input type="number" name="age_max" value="<?= htmlspecialchars($age_max) ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Rechercher</button>
            </div>

        </form>

    </div>
    <?php if ($submitted) { ?>
    <div class="card">
            <h2><?= count($results) ?> résultat(s)<?= count($results) === 200 ? ' (limité à 200)' : '' ?></h2>
            <table class="table" border="1">
                <tr>
                    <th>N°</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Âge</th>
                    <th>Département</th>
                </tr>
                <?php foreach ($results as $emp) { ?>
                    <tr>
                        <td><a href="fiche.php?emp_no=<?= urlencode($emp['emp_no']) ?>"><?= $emp['emp_no'] ?></a></td>
                        <td><?= $emp['first_name'] ?></td>
                        <td><?= $emp['last_name'] ?></td>
                        <td><?= $emp['gender'] ?></td>
                        <td><?= $emp['age'] ?></td>
                        <td><?= $emp['dept_name'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php } ?>

</div>

    </body>
</html>