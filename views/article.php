<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'article</title>
    <!-- Ajoutez ici vos feuilles de style CSS -->
</head>
<body>
    <?php
    require_once '../controllers/article.php';
?>
<?php
// Vérifiez d'abord si les détails de l'article existent
if(isset($article_details)) {
    ?>
    <h1>Détails de l'article</h1>
    <div>
        <h2><?php echo $article_details->getNomArticle(); ?></h2>
        <p><strong>Catégorie:</strong> <?php echo $article_details->getCategorie(); ?></p>
        <p><strong>Descriptif:</strong> <?php echo $article_details->getDescriptif(); ?></p>
        <p><strong>Lieu:</strong> <?php echo $article_details->getLieu(); ?></p>
        <p><strong>Ingrédients:</strong> <?php echo $article_details->getIngredients(); ?></p>
        <p><strong>Nombre de personnes:</strong> <?php echo $article_details->getNbPersonnes(); ?></p>
        <!-- Ajoutez ici d'autres détails de l'article -->
        <?php
        // Afficher les images associées à l'article
        $image_paths = $article->getImagePaths();
        if (!empty($image_paths)) {
            echo "<h3>Images associées:</h3>";
            foreach ($image_paths as $image_path) {
                echo "<img src='$image_path' alt='Image de l'article'>";
            }
        }
        ?>
    </div>
    <?php
} else {
    // Gérer le cas où les détails de l'article n'ont pas pu être récupérés
    echo "Aucun détail d'article trouvé.";
}
?>
    <!-- Ajoutez ici d'autres éléments de l'interface utilisateur -->
</body>
</html>
