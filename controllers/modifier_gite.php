<?php
require_once '../models/ajout_gite.php';

// Vérifier si les données du formulaire sont définies
if (isset($_POST['id'], $_POST['nom_gite'], $_POST['region'], $_POST['localisation'], $_POST['capacite'], $_POST['descriptif'], $_POST['tarifs'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // ID du gîte à mettre à jour
    $new_name = $_POST['nom_gite'];
    $new_region = $_POST['region'];
    $new_place = $_POST['localisation'];
    $new_capacite = $_POST['capacite'];
    $new_descriptif = $_POST['descriptif'];
    $new_price = $_POST['tarifs'];

    // Créer un objet Gites avec les nouvelles données
    $gite = new Gites();
    $gite->setName($new_name);
    $gite->setRegion($new_region);
    $gite->setPlace($new_place);
    $gite->setCapacite($new_capacite);
    $gite->setDescriptif($new_descriptif);
    $gite->setPrice($new_price);
    $gite->setId($id); // Définir l'ID du gîte

    // Mettre à jour le gîte dans la base de données
    $updateResult = $gite->updateGite();

    // Vérifier si la mise à jour a réussi
    if ($updateResult) {
        // Vérifier s'il y a des images à supprimer
        if (isset($_POST['images_to_delete'])) {
            $imagesToDelete = $_POST['images_to_delete'];
            $gite->deleteImages($imagesToDelete);
        }

        // Mettre à jour les images du gîte
        if (isset($_FILES['images'])) {
            $newImages = $_FILES['images']; // Récupérer les fichiers envoyés via le formulaire
            $gite->updateImages($giteId, $newImages);
        }

        // Rediriger vers une page de confirmation ou effectuer une autre action après la mise à jour
        header("Location: ../views/votre-gite.php?id=$id");
        exit;
    } else {
        // Afficher un message d'erreur si la mise à jour du gîte a échoué
        echo "Erreur lors de la mise à jour du gîte.";
        exit;
    }
} else {
    // Afficher un message d'erreur si les données du formulaire ne sont pas définies
    echo "Erreur: Les données du formulaire sont manquantes.";
    exit;
}
?>
