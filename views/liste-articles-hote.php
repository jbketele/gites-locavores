<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de vos articles</title>
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
                <th>Description</th>
                <th>Lieu</th>
                <!-- Ajoutez d'autres en-têtes de colonnes au besoin -->
            </tr>
        </thead>
        <tbody>
            <!-- Utilisez PHP pour parcourir les gîtes et afficher les détails -->
            <?php foreach ($articles as $article) : 
                echo "<tr data-article-id='" . $article['Id_Article'] . "'>";
                    echo "<td class='titre'>" . $article['nom'] . "</td>";
                    echo "<td class='descriptif'>" . $article['descriptif'] . "</td>";
                    echo "<td>" . $article['Lieu'] . "</td>";
                    echo "<td><a href='../controllers/supprimer-article.php?id=" . $article['Id_Article'] .
                    "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')\"><i class='bi bi-trash'></i></a>";
                    echo "</tr>";
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Pagination">
    <ul class="pagination">
        <?php for($i = 1; $i <= $totalPages; $i++) : ?>
            <?php if ($i == $page) : ?>
                <li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
            <?php else : ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endif; ?>
            <?php if ($i < $totalPages) : ?>
                <li class="page-item"><span>&nbsp;</span></li> <!-- Ajoutez un espace entre les numéros de page -->
            <?php endif; ?>
        <?php endfor; ?>
    </ul>
</nav>
</div>
<br><br>
    <?php include('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>

<script>
// Fonction pour tronquer le texte en fonction de la largeur de l'écran
function truncateText() {
    var screenWidth = window.innerWidth;
    var maxCharacters;

    // Définir les longueurs maximales en fonction de la largeur de l'écran
    if (screenWidth < 768) {
        maxCharacters = {
            '.descriptif': 30,
            '.titre': 30
        };
    } else if (screenWidth < 992) {
        maxCharacters = {
            '.descriptif': 100,
            '.titre': 50
        };
    } else {
        maxCharacters = {
            '.descriptif': 150,
            '.titre': 100
        };
    }

    // Parcourir tous les sélecteurs et tronquer le texte en conséquence
    Object.keys(maxCharacters).forEach(function(selector) {
        var elements = document.querySelectorAll(selector);
        var maxLength = maxCharacters[selector];
        for (var i = 0; i < elements.length; i++) {
            var text = elements[i].textContent;
            var truncatedText = text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
            elements[i].textContent = truncatedText;
        }
    });
}

// Appeler la fonction pour tronquer le texte au chargement de la page et lors du redimensionnement de la fenêtre
window.addEventListener('DOMContentLoaded', truncateText);
window.addEventListener('resize', truncateText);



document.addEventListener('DOMContentLoaded', function() {
    var articleRows = document.querySelectorAll('tr'); // Sélectionnez toutes les lignes d'articles

    articleRows.forEach(function(row) {
        row.addEventListener('click', function() {
            var articleId = row.dataset.articleId; // Récupérez l'ID de l'article à partir de l'attribut data-article-id de la ligne
            var articleDetailUrl = 'article.php?id=' + articleId; // Construisez l'URL de la page de détail de l'article
            window.location.href = articleDetailUrl; // Redirigez l'utilisateur vers la page de détail de l'article
        });
    });
});



</script>
</body>
</html>
