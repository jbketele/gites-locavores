<?php
require_once '../models/database.php';
require_once '../models/user.php';

class Article {
    private $categorie;
    private $nom;
    private $descriptif;
    private $lieu;
    private $ingredients;
    private $nb_personnes;
    private $image_paths;
    private $user_id;

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setNomArticle($nom) {
        $this->nom = $nom;
    }

    public function getNomArticle() {
        return $this->nom;
    }

    public function setDescriptif($descriptif) {
        $this->descriptif = $descriptif;
    }

    public function getDescriptif() {
        return $this->descriptif;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function setIngredients($ingredients) {
        $this->ingredients = $ingredients;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function setNbPersonnes($nb_personnes) {
        $this->nb_personnes = $nb_personnes;
    }

    public function getNbPersonnes() {
        return $this->nb_personnes;
    }

    public function setImagePaths($image_paths) {
        if (is_array($image_paths)) {
            $this->image_paths = $image_paths;
        } else {
            $this->image_paths = [];
            // Si vous avez un seul chemin d'image à assigner, vous pouvez l'ajouter directement au tableau
            $this->image_paths[] = $image_paths;
        }
    }
    

    public function getImagePaths() {
        return $this->image_paths;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getUserId() {
        return $this->user_id;
    }


    public static function ajouterArticle($article) {
        // Connexion à la base de données
        $connexion = Database::getInstance();
        $userId = Utilisateur::getCurrentUserId(); // Récupérer l'ID de l'utilisateur connecté
    
        try {
            // Requête SQL pour insérer l'article dans la table des articles
            $query = "INSERT INTO Article (nom, categorie, descriptif, lieu, Ingrédients, nb_personnes, Id_Utilisateur) 
                      VALUES (:nom, :categorie, :descriptif, :lieu, :ingredients, :nb_personnes, :userId)";
            $statement = $connexion->prepare($query);
    
            // Récupération des données de l'article
            $nom = $article->getNomArticle();
            $categorie = $article->getCategorie();
            $descriptif = $article->getDescriptif();
            $lieu = $article->getLieu();
            $ingredients = $article->getIngredients();
            $nb_personnes = $article->getNbPersonnes();
    
            // Vérification et gestion des valeurs null
            if (empty($nb_personnes)) {
                $nb_personnes = null;
            }
            
            if (empty($ingredients)) {
                $ingredients = null;
            }    
    
            // Liaison des valeurs aux paramètres de la requête
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':categorie', $categorie); 
            $statement->bindParam(':descriptif', $descriptif);
            $statement->bindParam(':lieu', $lieu);
            $statement->bindParam(':ingredients', $ingredients);
            $statement->bindParam(':nb_personnes', $nb_personnes);
            $statement->bindParam(':userId', $userId);            
            $statement->execute();
    
            // Récupération de l'ID de l'article inséré
            $article_id = $connexion->lastInsertId();
    
            // Traitement des images
            $image_data = $_FILES['image_path'];
            if (!empty($image_data['name'][0])) {
                // Stocker les chemins des images dans la base de données
                foreach ($image_data['name'] as $index => $filename) {
                    $temp_file = $image_data['tmp_name'][$index]; // Chemin temporaire du fichier
                    $destination = '../views/img/img_article/' . $filename; // Chemin de destination permanent pour les images d'articles
                    // Déplacer le fichier téléchargé vers le répertoire permanent
                    if (move_uploaded_file($temp_file, $destination)) {
                        // Ajouter le chemin de l'image à la base de données
                        $query = 'INSERT INTO image_article (Id_Article, image_path) VALUES (:article_id, :image_path)';
                        $statement = $connexion->prepare($query);
                        $statement->bindParam(':article_id', $article_id);
                        $statement->bindParam(':image_path', $destination);
                        $statement->execute();
                    } else {
                        echo "Erreur lors du déplacement du fichier !";
                    }
                }
            }
            
    
            return $article_id; // Retourner l'ID de l'article inséré
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de l'ajout de l'article : " . $e->getMessage();
            return false;
        }
    }
    
    public static function uploadImages($article_id, $image_data) {
        $connexion = Database::getInstance();
        $destination_dir = '../views/img/img_article/'; // Répertoire de destination permanent
    
        // Parcourir les fichiers téléchargés
        foreach ($image_data['name'] as $index => $filename) {
            $temp_file = $image_data['tmp_name'][$index];
            $destination = $destination_dir . $filename; // Chemin de destination permanent
            // Déplacer le fichier téléchargé vers le répertoire permanent
            if (move_uploaded_file($temp_file, $destination)) {
                // Ajouter le chemin de l'image à la base de données
                $query = 'INSERT INTO image_article (image_path, Id_Article) VALUES (:image_path, :id_article)';
                $statement = $connexion->prepare($query);
                $statement->bindParam(':image_path', $destination);
                $statement->bindParam(':id_article', $article_id);
                $statement->execute();
            } else {
                echo "Erreur lors du déplacement du fichier.";
            }
        }
    }

    public static function getArticleById($article_id) {
        // Connexion à la base de données
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour sélectionner les détails de l'article par son ID
            $query = "SELECT A.*, IA.image_path 
            FROM Article A 
            JOIN image_article IA ON A.Id_Article = IA.Id_Article 
            WHERE A.Id_Article = :article_id";            
            $statement = $connexion->prepare($query);
            $statement->bindParam(':article_id', $article_id);
            $statement->execute();
    
            // Récupérer les détails de l'article
            $article_data = $statement->fetch(PDO::FETCH_ASSOC);
    
            // Créer une instance de la classe Article et la retourner
            $article = new Article();
            $article->setCategorie($article_data['categorie']);
            $article->setNomArticle($article_data['nom']);
            $article->setDescriptif($article_data['descriptif']);
            $article->setLieu($article_data['Lieu']);
            $article->setIngredients($article_data['Ingrédients']);
            $article->setNbPersonnes($article_data['Nb_personnes']);
            $article->setImagePaths($article_data['image_path']);
             
            return $article; // Retourner les détails de l'article
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération de l'article : " . $e->getMessage();
            return false;
        }
    }
        
    public function updateArticle() {
        $connexion = Database::getInstance();
        
        try {
            // Requête SQL pour mettre à jour un article dans la base de données
            $query = 'UPDATE Article SET categorie = :categorie, nom = :nom, descriptif = :descriptif, lieu = :lieu, Ingrédients = :ingredients, nb_personnes = :nb_personnes WHERE Id_Article = :id';
            $statement = $connexion->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':categorie', $this->categorie);
            $statement->bindParam(':nom', $this->nom);
            $statement->bindParam(':descriptif', $this->descriptif);
            $statement->bindParam(':lieu', $this->lieu);
            $statement->bindParam(':ingredients', $this->ingredients);
            $statement->bindParam(':nb_personnes', $this->nb_personnes);
            $statement->execute();
            
            return true; // Succès de la mise à jour
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur de mise à jour de l'article: " . $e->getMessage();
            return false; // Échec de la mise à jour
        }
    }
    
    public static function getAllArticles() {
        // Connexion à la base de données
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour récupérer tous les articles
            $query = "SELECT * FROM Article";
            $statement = $connexion->query($query);
    
            // Récupérer les résultats sous forme de tableau associatif
            $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $articles;
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des articles: " . $e->getMessage();
            return [];
        }
    }
    
    public static function getArticlesByUserId($user_id) {
        // Connexion à la base de données
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour récupérer les articles de l'utilisateur en fonction de son ID
            $query = "SELECT * FROM Article WHERE Id_Utilisateur = :user_id";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':user_id', $user_id);
            $statement->execute();
    
            // Récupérer les articles de l'utilisateur
            $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $articles;
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur lors de la récupération des articles de l'utilisateur : " . $e->getMessage();
            return [];
        }
    }
    
    public static function deleteArticle($article_id) {
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour supprimer le gîte de la base de données
            $query = "DELETE FROM Article WHERE Id_Article = :article_id";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':article_id', $article_id);
            $statement->execute();
    
            return true; // Succès de la suppression
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la suppression du gîte: " . $e->getMessage();
            return false; // Échec de la suppression
        }
    }

    public static function getEventArticles() {
        // Connexion à la base de données
        $connexion = Database::getInstance();
        
        try {
            // Requête SQL pour sélectionner les articles de la catégorie "évènements"
            $query = "SELECT a.*, ia.image_path FROM Article a
                  LEFT JOIN image_article ia ON a.Id_Article = ia.Id_Article
                  WHERE a.categorie IN ('evenements', 'évènements', 'Evènements', 'Evenements')";
            $statement = $connexion->query($query);
            
            // Récupérer les données des articles
            $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $articles; // Retourner les articles récupérés
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des articles : " . $e->getMessage();
            return false;
        }
    }
    
    public static function getActusArticles() {
        // Connexion à la base de données
        $connexion = Database::getInstance();
        
        try {
            // Requête SQL pour sélectionner les articles de la catégorie "évènements"
            $query = "SELECT a.*, ia.image_path FROM Article a
                  LEFT JOIN image_article ia ON a.Id_Article = ia.Id_Article
                  WHERE a.categorie IN ('actualités', 'actus', 'Actualités', 'Actus')";
            $statement = $connexion->query($query);
            
            // Récupérer les données des articles
            $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $articles; // Retourner les articles récupérés
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des articles : " . $e->getMessage();
            return false;
        }
    }

    public static function getRecettesArticles() {
        // Connexion à la base de données
        $connexion = Database::getInstance();
        
        try {
            // Requête SQL pour sélectionner les articles de la catégorie "évènements"
            $query = "SELECT a.*, ia.image_path FROM Article a
                  LEFT JOIN image_article ia ON a.Id_Article = ia.Id_Article
                  WHERE a.categorie IN ('recettes', 'Recettes')";
            $statement = $connexion->query($query);
            
            // Récupérer les données des articles
            $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $articles; // Retourner les articles récupérés
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des articles : " . $e->getMessage();
            return false;
        }
    }

    public static function getProduitsSaisonArticles() {
        // Connexion à la base de données
        $connexion = Database::getInstance();
        
        try {
            // Requête SQL pour sélectionner les articles de la catégorie "évènements"
            $query = "SELECT a.*, ia.image_path FROM Article a
                  LEFT JOIN image_article ia ON a.Id_Article = ia.Id_Article
                  WHERE a.categorie IN ('produits de saison', 'Produits de saison', 'produits_saison')";
            $statement = $connexion->query($query);
            
            // Récupérer les données des articles
            $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $articles; // Retourner les articles récupérés
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des articles : " . $e->getMessage();
            return false;
        }
    }

    public static function getArticlesByUserIdWithPagination($userId, $limit, $offset) {
        $connexion = Database::getInstance();
    
        try {
            $query = "SELECT * FROM Article WHERE Id_Utilisateur = :userId LIMIT :limit OFFSET :offset";
            $statement = $connexion->prepare($query);
            $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
            $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
            $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
            $statement->execute();
    
            // Récupérer les résultats de la requête
            $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $articles;
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des articles : " . $e->getMessage();
            return false;
        }
    }

    public static function getTotalArticlesByUserId($userId) {
        $connexion = Database::getInstance();
    
        try {
            $query = "SELECT COUNT(*) FROM Article WHERE Id_Utilisateur = :userId";
            $statement = $connexion->prepare($query);
            $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
            $statement->execute();
    
            // Récupérer le nombre total d'articles
            $totalArticles = $statement->fetchColumn();
            return $totalArticles;
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération du nombre total d'articles : " . $e->getMessage();
            return false;
        }
    }

    public static function getRandomArticles($limit) {
        $connexion = Database::getInstance();
        $query = "SELECT a.*, ia.image_path FROM Article a 
        LEFT JOIN image_article ia ON a.Id_Article = ia.Id_Article
        ORDER BY RAND() LIMIT :limit";
        $statement = $connexion->prepare($query);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}

