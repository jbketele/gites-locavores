<?php
require_once '../models/article.php'; // Incluez le fichier contenant votre modèle de gîte
require_once '../models/user.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

// Récupérez l'ID de l'utilisateur connecté
$userId = Utilisateur::getCurrentUserId();

// Récupérez les gîtes de l'utilisateur à partir de la base de données
$articles = Article::getArticlesByUserId($userId);

// Incluez la vue HTML pour afficher la liste des gîtes par utilisateur
include_once '../views/liste-articles-hote.php';
?>
