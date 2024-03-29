<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <?php session_start();
    require_once '../controllers/check-admin.php';
    require_once '../header-footer/header-hote.php'; 
    require_once '../models/article.php';
    $article_id = $_GET['id'];
    $article_details = Article::getArticleById($article_id);
    echo "<h2>Modifier Gîte</h2>";
    ?>
    <div class="ms-5">
    <form action="../controllers/modifier_article.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $article_id; ?>">
        <label for="categorie">Catégorie :</label>
        <input type="text" id="categorie" name="categorie" value="<?php echo $article_details['categorie']; ?>"><br>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $article_details['nom']; ?>"><br>
        <label for="descriptif">Descriptif :</label>
        <textarea id="descriptif" name="descriptif"><?php echo $article_details['descriptif']; ?></textarea><br>
        <label for="lieu">Lieu :</label>
        <input type="text" id="lieu" name="lieu" value="<?php echo $article_details['Lieu']; ?>"><br>
        <label for="images">Nouvelles Images :</label>
        <input type="file" id="images" name="images[]" multiple accept="image/*"><br>

        <!-- Afficher les champs ingrédients et nombre de personnes seulement si la catégorie est "recettes" -->
        <?php if ($article_details['categorie'] === 'recettes') : ?>
            <label for="ingredients">Ingrédients :</label>
            <textarea id="ingredients" name="ingredients"><?php echo $article_details['Ingrédients']; ?></textarea><br>
            <label for="nb_personnes">Nombre de personnes :</label>
            <input type="number" id="nb_personnes" name="nb_personnes" value="<?php echo $article_details['Nb_personnes']; ?>"><br>
        <?php endif; ?>
        <input type="submit" name="modifier_article" value="Modifier">
    </form>
    </div>
    <?php require_once '../header-footer/footer.php'; ?>
</body>
</html>
