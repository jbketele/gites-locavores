<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MZH9X7TZ0V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-MZH9X7TZ0V');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gites Locavores - Actus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>
<?php session_start();
require_once '../controllers/article.php';
require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>

    <main>
        <div class="d-flex justify-content-evenly pt-3">
            <a href="event.php" class="btn btn-warning">Évènements</a>
            <a href="actus.php" class="btn btn-warning">Actualités</a>
            <a href="recettes.php" class="btn btn-warning">Recettes</a>
            <a href="produits-saison.php" class="btn btn-warning">Produits de saison</a>
        </div>
        <section class="article-blog">
            <div class="row-cols-1 row-cols-md-3 cards-blog">
            
            <?php
            // Récupérer les articles de la catégorie "évènements"
            $actusArticles = Article::getActusArticles();
            
            // Vérifier si des articles ont été récupérés
            if ($actusArticles) {
                // Afficher les cartes des articles
                foreach ($actusArticles as $article) {
                    echo '<div class="container card-blog border-light shadow-lg col-md-4">';
                    echo '<img src="' . $article['image_path'] . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $article['nom'] . '</h5>';
                    echo '<p class="card-text descriptif">' . $article['descriptif'] . '</p>';
                    if (isset($article['Id_Article'])) {
                        echo '<a href="article.php?id=' . $article['Id_Article'] . '" class="btn btn-success">En savoir plus</a>';
                    } else {
                        echo '<a href="#" class="btn btn-danger">Article non disponible</a>';
                    }
                    echo '</div></div>';
                }
            } else {
                // Afficher un message si aucun article n'est disponible
                echo '<p>Aucun article disponible pour le moment.</p>';
            }
            ?>

            </div>
        </section>
    </main>

    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>
    <script src="../js/article.js"></script>

</body>

</html>