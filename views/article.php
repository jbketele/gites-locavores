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
    <?php session_start();
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

    // Vérifier si l'ID de l'article est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID de l'article depuis l'URL
    $article_id = $_GET['id'];

    // Appeler la méthode pour récupérer les détails de l'article par son ID
    $article_details = Article::getArticleById($article_id);

    if(!$article_details) {
        // Gérer le cas où la récupération des détails de l'article a échoué
        echo "Erreur lors de la récupération des détails de l'article.";
        exit; // Arrêter l'exécution du script car les détails de l'article sont nécessaires pour la suite du processus
    }
}
    ?>
<?php
// Vérifiez d'abord si les détails de l'article existent
if(isset($article_details)) {
    ?>
    <div class="ms-5">
        <h3><?php echo $article_details['nom']; ?></h3>

        <?php
        // Afficher les images associées à l'article
        $image_paths = $article_details['images'];
        if (!empty($image_paths)) {
            foreach ($image_paths as $image_path) {
                echo "<img class='img-article' src='$image_path' alt='Image de l'article'><br><br>";
            }
        }       
        ?>

        <?php
        if ($article_details['categorie'] === "produits_saison") { ?>
        <p>Catégorie : Produits de saison</p>

        <?php } elseif ($article_details['categorie'] === "recettes") { ?>
        <p>Catégorie : Recettes</p>

        <?php } elseif ($article_details['categorie'] === "actus") { ?>
        <p>Catégorie : Actualités</p>

        <?php } elseif ($article_details['categorie'] === "evenements") { ?>
        <p>Catégorie : Évènements</p>

        <?php } else { 
            var_dump($article_details);
            ?>
        <p>Catégorie : <?php echo $article_details['categorie']; ?></p>
        <?php } ?>

        <p>Descriptif : <?php echo $article_details['descriptif']; ?></p>
        <?php
        if ($article_details['categorie'] === "evenements" || $article_details['categorie'] === "actus") { 
            if ($article_details['Lieu']) {?>
            <p> Lieu : <?php echo $article_details['Lieu']; ?></p>
            
            <?php 
            }
            } 
            ?>

        <?php
        if ($article_details['categorie'] === "recettes") {
        ?>
        <p>Ingrédients : <?php echo $article_details['Ingrédients']; ?></p>
        <p>Nombre de personnes : <?php echo $article_details['Nb_personnes']; ?></p>
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
