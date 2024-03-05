<?php
require_once '../models/ajout_gite.php';

// Récupérer les données du formulaire de modification du gîte
$id = $_POST['id']; // ID du gîte à mettre à jour
$name = $_POST['nom_gite'];
$region = $_POST['region'];
$place = $_POST['localisation'];
$capacite = $_POST['capacite'];
$descriptif = $_POST['descriptif'];
$price = $_POST['tarifs'];

// Mettre à jour le gîte dans la base de données
$gite = new Gites();
$gite->updateGite($id, $name, $region, $place, $capacite, $descriptif, $price);
