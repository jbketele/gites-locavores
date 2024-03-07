<?php
require_once '../models/ajout_gite.php';

// Récupérer les régions depuis la base de données
$regions = Gites::getAllRegions(); // Suppose que vous avez une méthode pour récupérer toutes les régions depuis la base de données
