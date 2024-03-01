<?php
require_once '../models/database.php';

class Gites {
    private $name;
    private $host;
    private $region;
    private $place;
    private $capacite;
    private $descriptif;
    private $equipemenets;
    private $price;
   
    public function setName($name){
        $this->name = $name;
    }
    public function setHost($host) {
        $this->host = $host;
    }
    public function setRegion($region) {
        $this->region = $region;
    }
    public function setPlace($place) {
        $this->place = $place;
    }
    public function setCapacite($capacite){
        $this->capacite = $capacite;
    }
    public function setDescriptif($descriptif) {
        $this->descriptif = $descriptif;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    //Méthode pour ajouter un utilisateur à la base de données
    public function addGite () {
    $connexion = Database::getInstance();
    

    // Requête SQL pour ajouter un utilisateur à la base de données
    $query = 'INSERT INTO Gîtes (nom_gite, propriétaire, region, localisation, capacite, descriptif, tarifs) 
    VALUES (:nom_gite, :propriétaire, :region, :localisation, :capacite, :descriptif, :tarifs)';
    $statement = $connexion->prepare($query);
    $statement->bindParam(':nom_gite', $this->name);
    $statement->bindParam(':propriétaire', $this->host);
    $statement->bindParam(':region', $this->region);
    $statement->bindParam(':localisation', $this->place);
    $statement->bindParam(':capacite', $this->capacite);
    $statement->bindParam(':descriptif', $this->descriptif);
    $statement->bindParam(':tarifs', $this->price);
    $statement->execute();
    }
}

?>



 

        
