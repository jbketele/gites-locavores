<?php
require_once '../models/ajout_gite.php';
require_once '../models/user.php';
require_once '../models/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'utilisateur est connecté
    session_start();
    if (!isset($_SESSION['email'])) {
        // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
        header("Location: ../views/connexion.php");
        exit;
    }

    // Récupération des données du formulaire
    $name = $_POST['nom_gite'];
    $region = $_POST['region'];
    $place = $_POST['localisation'];
    $capacite = $_POST['capacite'];
    $descriptif = $_POST['descriptif'];
    $price = $_POST['tarifs'];


    
    // Récupérer d'autres données du formulaire

    $userId = Utilisateur::getCurrentUserId();
    // Création d'un nouvel objet Gite et ajout à la base de données
    $gite = new Gites();
    $gite->setName($name);
    $gite->setRegion($region);
    $gite->setPlace($place);
    $gite->setCapacite($capacite);
    $gite->setDescriptif($descriptif);
    $gite->setPrice($price);
    $gite->setProprietaireId($userId); // Associer l'ID de l'utilisateur connecté à la colonne de la clé étrangère

    // Vérifiez si des fichiers ont été téléchargés
    if (!empty($_FILES['image_path'])) {
        // Appelez la méthode pour gérer le téléchargement de fichiers
        Gites::uploadImages($lastInsertId, $_FILES['image_path']);
    }
    
  $newGiteId = $gite->addGite($uploadedImages);


    if ($newGiteId) {
        // Redirection vers une page de confirmation ou autre
        header("Location: ../views/votre-gite.php?id=$newGiteId");
        exit;
    } else {
        // header("Location: ../views/ajout_gite.php");
    }
}
?>
