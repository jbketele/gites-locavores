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
require_once '../controllers/liste-articles-hote.php';
require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>

    <h2>Liste de vos articles</h2>
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Lieu</th>
                <th>Ingrédients</th>
                <th>Nb de personnes</th>
                <!-- Ajoutez d'autres en-têtes de colonnes au besoin -->
            </tr>
        </thead>
        <tbody>
            <!-- Utilisez PHP pour parcourir les gîtes et afficher les détails -->
            <?php foreach ($articles as $article) : 
                echo "<tr>";
                    echo "<td>" . $article['nom'] . "</td>";
                    echo "<td>" . $article['categorie'] . "</td>";
                    echo "<td>" . $article['descriptif'] . "</td>";
                    echo "<td>" . $article['Lieu'] . "</td>";
                    echo "<td>" . $article['Ingrédients'] . "</td>";
                    echo "<td>" . $article['Nb_personnes'] . "</td>";
                    echo "<td><a href='../views/votre-gite.php?id=" . $article['Id_Article'] ."'>Voir le gîte</a></td>";
                    echo "<td><a href='../controllers/supprimer-article.php?id=" . $article['Id_Article'] ."' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')\">Supprimer</a>";
                    echo "</tr>";
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
