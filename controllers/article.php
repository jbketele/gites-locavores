<?php
session_start();
require_once '../models/article.php';
$userId = Utilisateur::getCurrentUserId();

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_article'])) {
    // Créer une nouvelle instance de l'objet Article
    $article = new Article();
    $article->setCategorie($_POST['categorie']);
    $article->setNomArticle($_POST['nom_article']);
    $article->setDescriptif($_POST['descriptif']);
    $article->setLieu($_POST['lieu']);
    $article->setIngredients($_POST['ingredients']);
    $article->setNbPersonnes($_POST['nb_personnes']);
    $article->setUserId($userId);
    $article_id = Article::ajouterArticle($article);

    // Vérifiez si des fichiers ont été téléchargés
    if (!empty($_FILES['image_path'])) {
        // Appelez la méthode pour gérer le téléchargement de fichiers
        Article::uploadImages($article_id, $_FILES['image_path']);
    }

    // Appeler la méthode du modèle pour ajouter l'article
    if ($article_id) {
        // Rediriger vers la page de confirmation de l'ajout d'article avec l'ID de l'article ajouté
        echo "L'article a été ajouté !";
        header("Location: ../views/article.php?id=$article_id");
        exit;
    } else {
        // Gérer le cas où l'ajout de l'article a échoué
        echo "L'ajout de l'article a échoué. Veuillez réessayer.";
    }
}
?>
