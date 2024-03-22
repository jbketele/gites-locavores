<?php
require_once '../models/article.php'; // Inclure le modèle d'articles
require_once '../models/user.php'; // Inclure le modèle d'utilisateur
require_once '../models/database.php'; // Inclure le modèle de base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'utilisateur est connecté
    session_start();
    if (!isset($_SESSION['email'])) {
        // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
        header("Location: ../views/connexion.php");
        exit;
    }

    // Récupération des données du formulaire
    $categorie = $_POST['categorie'];
    $nom_article = $_POST['nom_article'];
    $descriptif = $_POST['descriptif'];
    $lieu = $_POST['lieu'];
    $ingredients = $_POST['ingredients'];
    $nb_personnes = $_POST['nb_personnes'];

    // Récupérer l'ID de l'utilisateur connecté
    $userId = Utilisateur::getCurrentUserId();

    // Création d'un nouvel objet Article et ajout à la base de données
    $article = new Article();
    $article->setCategorie($categorie);
    $article->setNomArticle($nom_article);
    $article->setDescriptif($descriptif);
    $article->setLieu($lieu);
    $article->setIngredients($ingredients);
    $article->setNbPersonnes($nb_personnes);
    $article->setUserId($userId);

    // Ajout de l'article dans la base de données
    $newArticleId = $article->ajouterArticle($article);

    if ($newArticleId) {
        // Redirection vers une page de confirmation ou autre
        header("Location: ../views/article.php?id=$newArticleId");
        exit;
    } else {
        // Gérer le cas où l'ajout de l'article a échoué
        echo "L'ajout de l'article a échoué. Veuillez réessayer.";
    }
}
?>
