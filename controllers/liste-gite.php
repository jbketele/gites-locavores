<?php
require_once '../models/ajout_gite.php';

// Récupérer toutes les régions depuis la base de données
$regions = Gites::getAllRegions();
$gitesNormandie = Gites::getGitesByRegionImage('Normandie');
$gitesHdf = Gites::getGitesByRegionImage('Hauts de France');
$gitesPaca = Gites::getGitesByRegionImage("Provence-Alpes-Côte d'Azur");
$gitesBretagne = Gites::getGitesByRegionImage('Bretagne');
$gitesIdf = Gites::getGitesByRegionImage('Île-de-France');
$gitesGrandEst = Gites::getGitesByRegionImage('Grand Est');
$gitesPdl = Gites::getGitesByRegionImage('Pays de la Loire');
$gitesOccitanie = Gites::getGitesByRegionImage('Occitanie');
$gitesNAquitaine = Gites::getGitesByRegionImage('Nouvelle-Aquitaine');
$gitesCorse = Gites::getGitesByRegionImage('Corse');
$gitesCvdl = Gites::getGitesByRegionImage('Centre-Val de Loire');
$gitesBfc = Gites::getGitesByRegionImage('Bourgogne-Franche-Comté');
$gitesAra = Gites::getGitesByRegionImage('Auvergne-Rhônes-Alpes');

?>