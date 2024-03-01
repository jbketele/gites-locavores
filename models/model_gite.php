<?php

class GiteModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function insertGite($farm_name, $host_name, $region, $location, $capacite, $description) {
        $sql = "INSERT INTO gîtes (nom_gite, propriétaire, region, localisation, capacite, descriptif) 
                VALUES (:farm_name, :host_name, :region, :location, :capacite, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':farm_name', $farm_name);
        $stmt->bindParam(':host_name', $host_name);
        $stmt->bindParam(':region', $region);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':capacite', $capacite);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }
}
