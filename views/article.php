<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css"></head>
<body>
    <?php
    require_once '../controllers/article.php';
    
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user_type = Utilisateur::getUserTypeById($user_id);
        if ($user_type === 'hôte') {
        // Inclure le header spécifique à un hôte
        include '../header-footer/header-hote.php';
        } elseif ($user_type === 'visiteur') {
            include '../header-footer/header-connect.php';
        }
    } else {
        include '../header-footer/header.php';
    }
    ?>
<?php
// Vérifiez d'abord si les détails de l'article existent
if(isset($article_details)) {
    ?>
    <h1>Détails de l'article</h1>
    <div class="container">
        <h2><?php echo $article_details->getNomArticle(); ?></h2>
        <p><strong>Catégorie:</strong> <?php echo $article_details->getCategorie(); ?></p>
        <p><strong>Descriptif:</strong> <?php echo $article_details->getDescriptif(); ?></p>
        <p><strong>Lieu:</strong> <?php echo $article_details->getLieu(); ?></p>
        <p><strong>Ingrédients:</strong> <?php echo $article_details->getIngredients(); ?></p>
        <p><strong>Nombre de personnes:</strong> <?php echo $article_details->getNbPersonnes(); ?></p>
        <!-- Ajoutez ici d'autres détails de l'article -->
        <?php
        // Afficher les images associées à l'article
        $image_paths = $article_details->getImagePaths();
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
