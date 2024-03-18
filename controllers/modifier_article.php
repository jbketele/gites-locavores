<?php
require_once '../models/article.php';


// Vérifiez si le formulaire de modification de l'article a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_article'])) {
    // Récupérer les données du formulaire de modification de l'article
    $id = $_POST['id'];
    $new_categorie = $_POST['categorie'];
    $new_nom = $_POST['nom'];
    $new_descriptif = $_POST['descriptif'];
    $new_lieu = $_POST['lieu'];
    if (isset($_POST['ingredients']) && isset($_POST['nb_personnes'])) {
        $new_ingredients = $_POST['ingredients'];
        $new_nb_personnes = $_POST['nb_personnes'];        
    } else {
        $new_ingredients = null;
        $new_nb_personnes = null;
    }


    // Créer une instance de la classe Article et appeler la méthode de mise à jour de l'article
    $article = new Article();
$article->updateArticle();
        // Rediriger vers une page de confirmation ou effectuer une autre action après la mise à jour
        header("Location: ../views/article.php?id=$id");
        exit;
}
?>
