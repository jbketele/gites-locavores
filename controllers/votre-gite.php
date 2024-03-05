<?php
require_once '../models/ajout_gite.php';

// Récupération des données du gîte en fonction de son ID
$giteId = $_GET['id']; // Supposons que l'ID du gîte soit passé dans l'URL
$gite = Gites::getGiteById($giteId); // Méthode pour récupérer les données du gîte en fonction de son ID

// Passer les données du gîte à la vue
include '../views/votre-gite.php';
?>
