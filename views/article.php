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
    <div class="ms-5">
        <h3><?php echo $article_details->getNomArticle(); ?></h3>

        <?php
        // Afficher les images associées à l'article
        $image_paths = $article_details->getImagePaths();
        if (!empty($image_paths)) {
            foreach ($image_paths as $image_path) {
                echo "<img class='img-article' src='$image_path' alt='Image de l'article'><br><br>";
            }
        }       
        ?>

        <?php
        if ($article_details->getCategorie() === "produits_saison") { ?>
        <p>Catégorie : Produits de saison</p>

        <?php } elseif ($article_details->getCategorie() === "recettes") { ?>
        <p>Catégorie : Recettes</p>

        <?php } elseif ($article_details->getCategorie() === "actus") { ?>
        <p>Catégorie : Actualités</p>

        <?php } elseif ($article_details->getCategorie() === "evenements") { ?>
        <p>Catégorie : Évènements</p>

        <?php } else { ?>
        <p>Catégorie : <?php echo $article_details->getCategorie(); ?></p>
        <?php } ?>

        <p>Descriptif : <?php echo $article_details->getDescriptif(); ?></p>
        <?php
        if ($article_details->getCategorie() === "evenements" || $article_details->getCategorie() === "actus") { 
            if ($article_details->getLieu()) {?>
            <p> Lieu : <?php echo $article_details->getLieu(); ?></p>
            
            <?php 
            }
            } 
            ?>

        <?php
        if ($article_details->getCategorie() === "recettes") {
        ?>
        <p>Ingrédients : <?php echo $article_details->getIngredients(); ?></p>
        <p>Nombre de personnes : <?php echo $article_details->getNbPersonnes(); ?></p>
        <?php } ?>

        <a href="../views/modifier_article.php?id=<?php echo $article_id; ?>">Modifier cet article</a>
    </div>
    <?php
} else {
    // Gérer le cas où les détails de l'article n'ont pas pu être récupérés
    echo "Aucun détail d'article trouvé.";
}

require_once '../header-footer/footer.php';
?>
    <!-- Ajoutez ici d'autres éléments de l'interface utilisateur -->
</body>
</html>
