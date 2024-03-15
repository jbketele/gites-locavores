<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des gîtes par utilisateur</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<?php session_start();
require_once '../controllers/liste-gite-hote.php';
require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header-hote.php'); ?>

    <h2>Liste de vos gîtes</h2>
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>Nom du gîte</th>
                <th>Région</th>
                <th>Localisation</th>
                <th>Capacité</th>
                <!-- Ajoutez d'autres en-têtes de colonnes au besoin -->
            </tr>
        </thead>
        <tbody>
            <!-- Utilisez PHP pour parcourir les gîtes et afficher les détails -->
            <?php foreach ($gites as $gite) : 
                echo "<tr>";
                    echo "<td>" . $gite['nom_gite'] . "</td>";
                    echo "<td>" . $gite['region'] . "</td>";
                    echo "<td>" . $gite['localisation'] . "</td>";
                    echo "<td>" . $gite['capacite'] . "</td>";
                    echo "<td><a href='../views/votre-gite.php?id=" . $gite['Id_Gîtes'] ."'>Voir le gîte</a></td>";
                    echo "<td><a href='../controllers/supprimer_gite.php?id=" . $gite['Id_Gîtes'] ."' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce gîte ?')\">Supprimer</a>";
                    echo "</tr>";
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>
