<?php
    include('../inc/functions.php');
    $stats = get_jobs_stats();
?>
<html>
    <head>
        <title>Statistiques par emploi</title>
        <link rel="stylesheet" href="../design/theme-dark/style.css">
    </head>
    <nav class="navbar">
        <p><a href="index.php">&larr; Retour aux départements</a></p>

    </nav>

    <body>
        <div class="container">
            <h1>Statistiques par emploi</h1>
        
            <table border="1" class ="table">
                <thead>
                    <tr>
                        <th>Emploi</th>
                        <th>Hommes</th>
                        <th>Femmes</th>
                        <th>Total</th>
                        <th>Salaire moyen</th>
                    </tr>
        
                </thead>
                <tbody>
                    <?php foreach ($stats as $row) { ?>
                        <tr>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['nb_hommes'] ?></td>
                            <td><?= $row['nb_femmes'] ?></td>
                            <td><?= $row['nb_total'] ?></td>
                            <td><?= number_format($row['salaire_moyen'], 0, ',', ' ') ?> €</td>
                        </tr>
                    <?php } ?>
        
                </tbody>
            </table>

        </div>
    </body>
</html>