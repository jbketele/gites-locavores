<?php
require_once '../models/ajout_gite.php';

// Récupérer toutes les régions depuis la base de données
$regions = Gites::getAllRegions();

// Déterminer quelle vue inclure en fonction de la région
if (in_array("Normandie", $regions)) {
    // Récupérer les gîtes de la région Normandie depuis le modèle
    $gitesNormandie = Gites::getGitesByRegion('Normandie');
    require_once '../views/normandie.php';
} elseif (in_array("Hauts de France", $regions)) {
    // Récupérer les gîtes de la région Hauts-de-France depuis le modèle
    $gitesHdf = Gites::getGitesByRegion('Hauts de France');
    require_once '../views/hauts-de-france.php';
} else {
    // Gérer le cas où aucune des régions n'est présente dans la liste
}
?>
