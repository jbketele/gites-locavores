<?php
require_once '../models/article.php';

if (isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // Appeler la méthode du modèle pour supprimer le gîte
    if (Article::deleteArticle($article_id)) {
        // Rediriger vers une page de confirmation ou toute autre action après la suppression
        header("Location: ../views/liste-articles-hote.php");
        exit;
    } else {
        // Gérer le cas où la suppression du gîte a échoué
        echo "Erreur lors de la suppression du gîte.";
    }
} else {
    // Gérer le cas où l'ID du gîte à supprimer n'est pas présent dans la requête POST
    echo "ID de gîte manquant dans la requête.";
}

