<?php
require_once 'models/model_gite.php';

class GiteController {
    private $model;

    public function __construct($pdo) {
        $this->model = new GiteModel($pdo);
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom_gite = $_POST["nom_gite"];
            $proprietaire = $_POST["propriétaire"];
            $region = $_POST["region"];
            $localisation = $_POST["localisation"];
            $capacite = $_POST["capacite"];
            $descriptif = $_POST["descriptif"];

            $this->model->insertGite($nom_gite, $proprietaire, $region, $localisation, $capacite, $descriptif);
            echo "Données insérées avec succès.";
        }else {
            include 'views/ajout_gite.php';
        }
    }
}
