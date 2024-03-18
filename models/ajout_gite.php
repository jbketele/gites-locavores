<?php
require_once '../models/database.php';
require_once '../models/user.php';

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
        $destination_dir = '../views/img/img_gite/';
    
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
            $query = "SELECT G.*, U.Nom, U.Prénom
            FROM Gîtes G
            LEFT JOIN Utilisateur U ON G.Id_Utilisateur = U.Id_Utilisateur
            WHERE G.Id_Gîtes = :id_gite";
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

    public function updateGite() {
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour mettre à jour un gîte dans la base de données
            $query = 'UPDATE Gîtes SET nom_gite = :nom_gite, region = :region, localisation = :localisation, capacite = :capacite, descriptif = :descriptif, tarifs = :tarifs WHERE Id_Gîtes = :id_gite';
            $statement = $connexion->prepare($query);
            $statement->bindParam(':nom_gite', $this->name);
            $statement->bindParam(':region', $this->region);
            $statement->bindParam(':localisation', $this->place);
            $statement->bindParam(':capacite', $this->capacite);
            $statement->bindParam(':descriptif', $this->descriptif);
            $statement->bindParam(':tarifs', $this->price);
            $statement->bindParam(':id_gite', $giteId);
            $statement->execute();
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur de mise à jour du gîte: " . $e->getMessage();
        }
    }

    public function updateImages($giteId, $newImages) {
        $connexion = Database::getInstance();
    
        try {
            // Supprimer les anciennes images associées au gîte
            $deleteQuery = 'DELETE FROM Images WHERE Id_Gîtes = :id_gite';
            $deleteStatement = $connexion->prepare($deleteQuery);
            $deleteStatement->bindParam(':id_gite', $giteId);
            $deleteStatement->execute();
    
            // Insérer les nouvelles images associées au gîte
            foreach ($newImages as $image) {
                $insertQuery = 'INSERT INTO Images (Id_Gîtes, image_path) VALUES (:id_gite, :image_path)';
                $insertStatement = $connexion->prepare($insertQuery);
                $insertStatement->bindParam(':id_gite', $giteId);
                $insertStatement->bindParam(':image_path', $image);
                $insertStatement->execute();
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la mise à jour des images : " . $e->getMessage();
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
        $query = "SELECT G.*, I.image_path, U.Nom, U.Prénom 
        FROM Gîtes G LEFT JOIN Images I ON G.Id_Gîtes = I.Id_Gîtes 
        LEFT JOIN Utilisateur U ON G.Id_Utilisateur = U.Id_Utilisateur 
        WHERE G.region = :region";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':region', $region);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

        // Méthode pour récupérer les gîtes d'une région spécifique
        public static function getGitesByRegionImage($region) {
            $connexion = Database::getInstance();
            $query = "SELECT G.*, I.image_path, U.Nom, U.Prénom 
            FROM Gîtes G 
            LEFT JOIN (
                SELECT Id_Gîtes, MIN(Id_Images) AS min_image_id
                FROM Images 
                GROUP BY Id_Gîtes
            ) AS I_id ON G.Id_Gîtes = I_id.Id_Gîtes
            LEFT JOIN Images AS I ON I_id.Id_Gîtes = I.Id_Gîtes AND I_id.min_image_id = I.Id_Images
            LEFT JOIN Utilisateur U ON G.Id_Utilisateur = U.Id_Utilisateur 
            WHERE G.region = :region";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':region', $region);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function getAllGites() {
            $connexion = Database::getInstance();
        
            try {
                // Requête SQL pour récupérer tous les gîtes
                $query = "SELECT * FROM Gîtes";
                $statement = $connexion->query($query);
        
                // Récupérer les résultats sous forme de tableau associatif
                $gites = $statement->fetchAll(PDO::FETCH_ASSOC);
        
                return $gites;
            } catch (PDOException $e) {
                // Gérer les erreurs de base de données
                echo "Erreur lors de la récupération des gîtes: " . $e->getMessage();
                return [];
            }
        }

        public static function deleteGite($giteId) {
            $connexion = Database::getInstance();
        
            try {
                // Requête SQL pour supprimer le gîte de la base de données
                $query = "DELETE FROM Gîtes WHERE Id_Gîtes = :id_gite";
                $statement = $connexion->prepare($query);
                $statement->bindParam(':id_gite', $giteId);
                $statement->execute();
        
                return true; // Succès de la suppression
            } catch (PDOException $e) {
                // Gérer les erreurs de base de données
                echo "Erreur lors de la suppression du gîte: " . $e->getMessage();
                return false; // Échec de la suppression
            }
        }

        public static function getTotalGites() {
            $connexion = Database::getInstance(); // Obtenez une instance de connexion à la base de données
    
            try {
                // Requête SQL pour récupérer le nombre total de gîtes
                $query = "SELECT COUNT(*) AS total FROM Gîtes";
                $statement = $connexion->query($query);
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                return $row['total'];
            } catch (PDOException $e) {
                // Gérer les erreurs de base de données
                echo "Erreur lors de la récupération du nombre total de gîtes : " . $e->getMessage();
                return false;
            }
        }
    
        public static function getGitesWithPagination($limit, $offset) {
            $connexion = Database::getInstance(); // Obtenez une instance de connexion à la base de données
    
            try {
                // Requête SQL pour récupérer les gîtes avec pagination
                $query = "SELECT * FROM Gîtes LIMIT :limit OFFSET :offset";
                $statement = $connexion->prepare($query);
                $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
                $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Gérer les erreurs de base de données
                echo "Erreur lors de la récupération des gîtes avec pagination : " . $e->getMessage();
                return false;
            }
        }
    
}
?>