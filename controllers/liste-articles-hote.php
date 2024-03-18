<?php
require_once '../models/article.php'; // Inclure le modèle d'article
require_once '../models/user.php';
require_once '../models/ajout_gite.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

// Définir le nombre d'articles par page
$articlesParPage = 6;

// Récupérer l'ID de l'utilisateur connecté
$userId = Utilisateur::getCurrentUserId();

// Récupérer le numéro de page à partir de la requête GET
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculer l'offset pour la requête SQL en fonction du numéro de page
$offset = ($page - 1) * $articlesParPage;

// Récupérer les articles de l'utilisateur avec pagination
$articles = Article::getArticlesByUserIdWithPagination($userId, $articlesParPage, $offset);

// Récupérer le nombre total d'articles de l'utilisateur
$totalArticles = Article::getTotalArticlesByUserId($userId);

// Calculer le nombre total de pages
$totalPages = ceil($totalArticles / $articlesParPage);

// Inclure la vue HTML pour afficher la liste des articles par utilisateur avec pagination
include_once '../views/liste-articles-hote.php';
?>
