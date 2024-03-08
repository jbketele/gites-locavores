<?php
require_once '../models/database.php';

class Gites {
    private $name;
    private $region;
    private $place;
    private $capacite;
    private $descriptif;
    private $price;
    private $proprietaireId;
    private $imagePath;
    private $images = [];
   
    public function setName($name){
        $this->name = $name;
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
    public function setProprietaireId($proprietaireId) {
        $this->proprietaireId = $proprietaireId;
    }
    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
    }
    public function setImages($images) {    
        $this->images = $images;
    }
    public function getImages() {
        return $this->images;
    }

    // Méthode pour ajouter un gîte à la base de données
    public function addGite() {
        $connexion = Database::getInstance();
        $userId = Utilisateur::getCurrentUserId(); // Récupérer l'ID de l'utilisateur connecté

        try {
            // Requête SQL pour ajouter un gîte à la base de données
            $query = 'INSERT INTO Gîtes (nom_gite, region, localisation, capacite, descriptif, tarifs, Id_Utilisateur) 
            VALUES (:nom_gite, :region, :localisation, :capacite, :descriptif, :tarifs, :id_utilisateur)';
            $statement = $connexion->prepare($query);
            $statement->bindParam(':nom_gite', $this->name);
            $statement->bindParam(':region', $this->region);
            $statement->bindParam(':localisation', $this->place);
            $statement->bindParam(':capacite', $this->capacite);
            $statement->bindParam(':descriptif', $this->descriptif);
            $statement->bindParam(':tarifs', $this->price);
            $statement->bindParam(':id_utilisateur', $userId); // Associer l'ID de l'utilisateur connecté à la colonne de la clé étrangère
            $statement->execute();

            // Récupérer l'ID du gîte nouvellement ajouté
            $lastInsertId = $connexion->lastInsertId();

            // Récupérer les données des fichiers téléchargés
            $image_data = $_FILES['image_path'];
            if (!empty($image_data['name'][0])) {
                // Stocker les chemins des images dans la base de données
            foreach ($image_data['name'] as $index => $filename) {
                $temp_file = $image_data['tmp_name'][$index]; // Chemin temporaire du fichier
                $destination = '../views/img/img_gite/' . $filename; //Chemin de destination permanent
                // Déplacer le fichier téléchargé vers le répertoire permanent
                if (move_uploaded_file($temp_file, $destination)) {
                // Ajouter le chemin de l'image à la base de données
                $query = 'INSERT INTO Images (Id_Gîtes, image_path) VALUES (:id_gites, :image_path)';
                $statement = $connexion->prepare($query);
                $statement->bindParam(':id_gites', $lastInsertId);
                $statement->bindParam(':image_path', $destination);
                $statement->execute();
                } else {
                    echo "Erreur lors du déplacement du fichier.";

                }
            }
                
            }
            
            return $lastInsertId;
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur d'ajout de gîte: " . $e->getMessage();
        }
    }

    public static function uploadImages($giteId, $image_data) {
        $connexion = Database::getInstance();
        // Répertoire de destination permanent
        $destination_dir = '../views/img/img-gite/';
    
        // Parcourir les fichiers téléchargés
        foreach ($image_data['name'] as $index => $filename) {
            $temp_file = $image_data['tmp_name'][$index];
            $destination = $destination_dir . $filename; // Chemin de destination permanent
            // Déplacer le fichier téléchargé vers le répertoire permanent
            if (move_uploaded_file($temp_file, $destination)) {
                // Ajouter le chemin de l'image à la base de données
                $query = 'INSERT INTO Images (image_path, Id_Gîtes) VALUES (:image_path, :id_gites)';
                $statement = $connexion->prepare($query);
                $statement->bindParam(':image_path', $destination);
                $statement->bindParam(':id_gites', $giteId);
                $statement->execute();
            } else {
                echo "Erreur lors du déplacement du fichier.";
            }
        }
    }
    

    public static function getGiteById($giteId) {
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour récupérer les données du gîte en fonction de son ID
            $query = "SELECT * FROM Gîtes WHERE Id_GÎtes = :id_gite";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':id_gite', $giteId);
            $statement->execute();
    
            // Récupérer les données du gîte
            $gite = $statement->fetch(PDO::FETCH_ASSOC);

            // Récupérer les chemins d'image associés au gîte
            $queryImages = "SELECT image_path FROM Images WHERE Id_Gîtes = :id_gite";
            $statementImages = $connexion->prepare($queryImages);
            $statementImages->bindParam(':id_gite', $giteId);
            $statementImages->execute();
            $images = $statementImages->fetchAll(PDO::FETCH_COLUMN);

            // Ajouter les chemins d'image au tableau des détails du gîte
            $gite['images'] = $images ?: [];

            return $gite;
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur lors de la récupération du gîte: " . $e->getMessage();
            return false;
        }
    }

    public function updateGite($id, $name, $region, $place, $capacite, $descriptif, $price) {
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour mettre à jour un gîte dans la base de données
            $query = 'UPDATE Gîtes SET nom_gite = :nom_gite, region = :region, localisation = :localisation, capacite = :capacite, descriptif = :descriptif, tarifs = :tarifs WHERE id_gite = :id_gite';
            $statement = $connexion->prepare($query);
            $statement->bindParam(':nom_gite', $name);
            $statement->bindParam(':region', $region);
            $statement->bindParam(':localisation', $place);
            $statement->bindParam(':capacite', $capacite);
            $statement->bindParam(':descriptif', $descriptif);
            $statement->bindParam(':tarifs', $price);
            $statement->bindParam(':id_gite', $id);
            $statement->execute();
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur de mise à jour du gîte: " . $e->getMessage();
        }
    }

    public static function getGitesByUserId($userId) {
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour récupérer les gîtes de l'utilisateur en fonction de son ID
            $query = "SELECT * FROM Gîtes WHERE Id_Utilisateur = :user_id";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':user_id', $userId);
            $statement->execute();
    
            // Récupérer les données des gîtes de l'utilisateur
            $gites = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $gites;
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur lors de la récupération des gîtes de l'utilisateur: " . $e->getMessage();
            return false;
        }
    }
    // Méthode pour récupérer toutes les régions depuis la base de données
    public static function getAllRegions() {
        // Connexion à la base de données
        $connexion = Database::getInstance();

        try {
            // Requête SQL pour récupérer toutes les régions distinctes de la table "Gîtes"
            $query = "SELECT DISTINCT region FROM Gîtes";
            $statement = $connexion->query($query);

            // Récupérer les résultats sous forme de tableau associatif
            $regions = $statement->fetchAll(PDO::FETCH_COLUMN);

            return $regions;
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur lors de la récupération des régions: " . $e->getMessage();
            return [];
        }
    }
    
    // Méthode pour récupérer les gîtes d'une région spécifique
    public static function getGitesByRegion($region) {
        $connexion = Database::getInstance();
        $query = "SELECT * FROM Gîtes WHERE region = :region";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':region', $region);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>