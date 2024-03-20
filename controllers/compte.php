<?php
require_once '../models/user.php'; // Inclure le modèle d'utilisateur

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

// Récupérer l'ID de l'utilisateur connecté
$userId = Utilisateur::getCurrentUserId();

// Récupérer les informations de l'utilisateur à partir de son ID
$user = Utilisateur::getUserById($userId);


?>
