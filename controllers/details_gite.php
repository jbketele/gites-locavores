<?php
require_once '../models/ajout_gite.php';
// Vérifier si l'ID du gîte est passé dans l'URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Utiliser l'ID pour récupérer les détails du gîte depuis le modèle
    $gite = Gites::getGiteById($id);
    
    // Vérifier si le gîte existe
    if($gite) {
        // Passer les données à la vue des détails du gîte
        require_once '../views/details_gite.php';
    } else {
        // Gérer le cas où le gîte n'existe pas
        echo "Le gîte spécifié n'existe pas.";
    }
} else {
    // Gérer le cas où l'ID du gîte n'est pas spécifié dans l'URL
    echo "ID du gîte non spécifié dans l'URL.";
}
