<?php
require_once '../models/ajout_gite.php';

// Récupérer toutes les régions depuis la base de données
$regions = Gites::getAllRegions();
$gitesNormandie = Gites::getGitesByRegionImage('Normandie');
$gitesHdf = Gites::getGitesByRegionImage('Hauts de France');
?>