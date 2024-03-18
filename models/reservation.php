<?php
class Reservation {
    private $dateArrivee;
    private $dateDepart;
    private $nbPersonnes;
    private $userId;
    private $giteId;
    private $reservationId;

    // Getters et setters
    public function getDateArrivee() {
        return $this->dateArrivee;
    }

    public function setDateArrivee($dateArrivee) {
        $this->dateArrivee = $dateArrivee;
    }

    public function getDateDepart() {
        return $this->dateDepart;
    }

    public function setDateDepart($dateDepart) {
        $this->dateDepart = $dateDepart;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getGiteId() {
        return $this->giteId;
    }

    public function setGiteId($giteId) {
        $this->giteId = $giteId;
    }

    public function getReservationId() {
        return $this->reservationId;
    }

    public function setReservationId($reservationId) {
        $this->reservationId = $reservationId;
    }

    public function getNbPersonnes() {
        return $this->nb_personnes;
    }

    public function setNbPersonnes($nbPersonnes) {
        $this->nb_personnes = $nbPersonnes;
    }

    // Méthode pour réserver un gîte
    public static function reserverGite($giteId, $userId, $date_arrivee, $date_depart, $nbPersonnes) {
        // Connexion à la base de données
        $connexion = Database::getInstance();

        try {
            // Requête SQL pour insérer la réservation dans la table des réservations
            $query = "INSERT INTO Réservation (date_arrivee, date_depart, nombre_personnes, Id_Utilisateur, Id_Gîtes) 
                      VALUES (:date_arrivee, :date_depart, :nb_personnes, :userId, :giteId)";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':date_arrivee', $date_arrivee);
            $statement->bindParam(':date_depart', $date_depart);
            $statement->bindParam(':nb_personnes', $nbPersonnes);
            $statement->bindParam(':userId', $userId);
            $statement->bindParam(':giteId', $giteId);

            $statement->execute();

            // Récupérer l'ID de la dernière réservation insérée
            $reservation_id = $connexion->lastInsertId();

            // Récupérer le nom de l'utilisateur
            $user_nom = self::getNomUtilisateur($userId); // Utilisation de self:: pour appeler la méthode dans la même classe

            // Retourner l'ID de la réservation et le nom de l'utilisateur
            // Créer un nouvel objet Reservation avec les données insérées dans la base de données
            $reservation = new Reservation(
                $date_arrivee,
                $date_depart,
                $userId,
                $giteId,
                $nbPersonnes
            );

            $reservation->setReservationId($reservation_id);

            // Retourner l'objet Reservation
            return $reservation;        
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la réservation du gîte : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour récupérer le nom de l'utilisateur par ID
    public static function getNomUtilisateur($userId) {
        // Connexion à la base de données
        $connexion = Database::getInstance();

        try {
            // Requête SQL pour récupérer le nom de l'utilisateur par son ID
            $query = "SELECT nom FROM Utilisateur WHERE Id_Utilisateur = :userId";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':userId', $userId);
            $statement->execute();

            // Récupérer le résultat de la requête
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Si un résultat est trouvé, retourner le nom de l'utilisateur
                return $result['nom'];
            } else {
                // Si aucun résultat n'est trouvé, retourner une chaîne vide
                return "";
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération du nom de l'utilisateur : " . $e->getMessage();
            return ""; // ou false selon votre logique d'erreur
        }
    }

    public static function getReservationDetailsById($reservationId) {
        // Connexion à la base de données
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour récupérer les détails de la réservation par son ID
            $query = "SELECT r.*, g.nom_gite
            FROM Réservation r
            INNER JOIN Gîtes g ON r.Id_Gîtes = g.Id_Gîtes
            WHERE Id_Réservation = :reservation_id";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':reservation_id', $reservationId);
            $statement->execute();
    
            // Récupérer les détails de la réservation
            $reservation_details = $statement->fetch(PDO::FETCH_ASSOC);
            
            return $reservation_details;
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des détails de la réservation : " . $e->getMessage();
            return false;
        }
    }
    
}