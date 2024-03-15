<?php
require_once '../models/article.php'; // Incluez le fichier contenant votre modèle de gîte
require_once '../models/user.php';
require_once '../models/ajout_gite.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    // Par défaut, définissez la page sur 1
    $page = 1;
}

// Récupérez l'ID de l'utilisateur connecté
$userId = Utilisateur::getCurrentUserId();

// Récupérez les gîtes de l'utilisateur à partir de la base de données
$articles = Article::getArticlesByUserId($userId);

// Nombre de gîtes par page
$gitesParPage = 6;

// Récupérer le nombre total de gîtes
$totalGites = Gites::getTotalGites();

// Calculer le nombre total de pages
$totalPages = ceil($totalGites / $gitesParPage);

// Calculer l'offset
$offset = ($page - 1) * $gitesParPage;

// Récupérer les gîtes pour la page actuelle
$gites = Gites::getGitesWithPagination($gitesParPage, $offset);

// Incluez la vue HTML pour afficher la liste des gîtes par utilisateur
include_once '../views/liste-articles-hote.php';
?>
