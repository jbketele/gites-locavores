<?php
require_once '../models/database.php';

class Utilisateur {
    // Propriétés de l'utilisateur
    private $type;
    private $lastname;
    private $firstname;
    private $email;
    private $password;
    private $tel;


    //Définir les données de l'utilisateur
    public function setType($type){
        $this->type = $type;
    }
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT); // hacher le mot de passe
    }
    public function setTel($tel){
        $this->tel = $tel;
    }


    //Méthode pour ajouter un utilisateur à la base de données
    public function addUser () {
        $connexion = Database::getInstance();

        // Requête SQL pour ajouter un utilisateur à la base de données
        $query = 'INSERT INTO Utilisateur (type_user, Nom, Prénom, Email, Tel, Mot_de_passe) VALUES (:type_user, :nom, :prenom, :email, :tel, :mot_de_passe)';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':type_user', $this->type);
        $statement->bindParam(':nom', $this->lastname);
        $statement->bindParam(':prenom', $this->firstname);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':mot_de_passe', $this->password);
        $statement->bindParam(':tel', $this->tel);
        $statement->execute();
    }

    public static function getByEmail($email) {
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE Email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public static function verifyCredentials($email, $password) {
        $user = self::getByEmail($email);
        if ($user && password_verify($password, $user['Mot_de_passe'])) {
            return $user;
        }
        return false;
    }

    public static function getFirstNameByEmail($email) {
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("SELECT Prénom FROM Utilisateur WHERE Email = :email");
        $stmt->execute(['email' => $email]);
        $firstName = $stmt->fetchColumn();

        return $firstName;
    }

    public static function getCurrentUserId() {        
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        } else {
            return null;
        }
    }

    public static function getNomById($user_id) {
        // Connexion à la base de données
        $connexion = Database::getInstance();

        try {
            // Requête SQL pour sélectionner le nom de l'utilisateur par ID
            $query = "SELECT Nom FROM Utilisateur WHERE Id_Utilisateur = :user_id";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':user_id', $user_id);
            $statement->execute();

            // Récupérer le résultat de la requête
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            // Vérifier si le résultat est valide
            if ($result && isset($result['Nom'])) {
                return $result['Nom'];
            } else {
                // Retourner une valeur par défaut si aucun nom n'est trouvé pour l'ID donné
                return "Utilisateur inconnu";
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération du nom de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }    

    public static function getUserTypeById($user_id) {
        // Connexion à la base de données
        $connexion = Database::getInstance();
        
        try {
            // Requête SQL pour récupérer le type d'utilisateur par son ID
            $query = "SELECT type_user FROM Utilisateur WHERE Id_Utilisateur = :user_id";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':user_id', $user_id);
            $statement->execute();
            
            // Récupérer le type d'utilisateur
            $user_type = $statement->fetchColumn();
    
            return $user_type;
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération du type d'utilisateur : " . $e->getMessage();
            return false;
        }
    }
    
}