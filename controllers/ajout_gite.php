<?php
require_once '../models/ajout_gite.php';

echo "<br>-".$_POST['nom_gite'];
echo "<br>-".$_POST['proprietaire'];
echo "<br>-".$_POST['region'];
echo "<br>-".$_POST['localisation'];
echo "<br>-".$_POST['capacite'];
echo "<br>-".$_POST['descriptif'];
echo "<br>-".$_POST['tarifs'];


if (isset($_POST['nom_gite']) && isset($_POST['proprietaire']) && isset($_POST['region']) && isset($_POST['localisation']) 
&& isset($_POST['capacite'])&& isset($_POST['descriptif'])&& isset($_POST['equipements'])&& isset($_POST['tarifs'])) {
    $name = $_POST['nom_gite'];
    $host = $_POST['proprietaire'];
    $region = $_POST['region'];
    $place = $_POST['localisation'];
    $capacite = $_POST['capacite'];
    $descriptif = $_POST['descriptif'];
    $tarifs = $_POST['tarifs'];

    $gite = new Gites();
    $gite->setName($name);
    $gite->setHost($host);
    $gite->setRegion($region);
    $gite->setPlace($place);
    $gite->setCapacite($capacite);
    $gite->setDescriptif($descriptif);
    $gite->setPrice($tarifs);

$gite -> addGite();

header ("Location: ../views/regions.php");
}
?>