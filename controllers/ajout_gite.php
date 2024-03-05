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

var_dump($_SESSION);

    // Récupération des données du formulaire
    $name = $_POST['nom_gite'];
    $region = $_POST['region'];
    $place = $_POST['localisation'];
    $capacite = $_POST['capacite'];
    $descriptif = $_POST['descriptif'];
    $price = $_POST['tarifs'];

// Récupération de l'image
if(isset($_FILES['image_path'])) {
    $file = $_FILES['image_path'];

    // Vérifier s'il n'y a pas eu d'erreur lors du téléchargement
    if($file['error'] === UPLOAD_ERR_OK) {
        // Récupérer le nom du fichier
        $filename = $file['name'];

        // Stocker le nom du fichier dans la variable $image_path
        $image_path = $filename;
    } else {
        // Gérer les erreurs d'envoi de fichier
        echo "Une erreur s'est produite lors du téléchargement de l'image.";
    }
}
    // Récupérer d'autres données du formulaire

    var_dump($_POST);

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
    // Définir d'autres propriétés du gîte
    $gite->setImagePath($image_path);
    $newGiteId = $gite->addGite(); // Supposons que la méthode addGite() enregistre le gîte dans la base de données

    if ($newGiteId) {
        // Redirection vers une page de confirmation ou autre
        header("Location: ../views/votre-gite.php?id=$newGiteId");
        exit;
    } else {
        //header("Location: ../views/ajout_gite.php");
    }
}
?>
