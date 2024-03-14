<?php
require_once '../models/article.php';


// Vérifiez si le formulaire de modification de l'article a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_article'])) {
    // Récupérer les données du formulaire de modification de l'article
    $id = $_POST['id'];
    $categorie = $_POST['categorie'];
    $nom = $_POST['nom'];
    $descriptif = $_POST['descriptif'];
    $lieu = $_POST['lieu'];
    $ingredients = $_POST['ingredients'];
    $nb_personnes = $_POST['nb_personnes'];

    // Créer une instance de la classe Article et appeler la méthode de mise à jour de l'article
    $article = new Article();
    if ($article->updateArticle($id, $categorie, $nom, $descriptif, $lieu, $ingredients, $nb_personnes)) {
        // Rediriger vers une page de confirmation ou effectuer une autre action après la mise à jour
        header("Location: ../views/article.php?id=$id");
        exit;
    } else {
        // Gérer le cas où la mise à jour de l'article a échoué
        echo "Erreur lors de la mise à jour de l'article.";
    }
}
?>
