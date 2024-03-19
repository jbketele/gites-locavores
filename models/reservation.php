<?php
class Reservation {
    private $dateArrivee;
    private $dateDepart;
    private $nbPersonnes;
    private $userId;
    private $giteId;
    private $reservationId;
    private $prixTotal;


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

    public function setPrixTotal($prixTotal) {
        $this->prixTotal = $prixTotal;
    }

    public function getPrixTotal() {
        return $this->prixTotal;
    }

    // Méthode pour réserver un gîte
    public static function reserverGite($giteId, $userId, $date_arrivee, $date_depart, $nbPersonnes) {
        // Connexion à la base de données
        $connexion = Database::getInstance();
    
        try {
            // Requête SQL pour obtenir le prix par nuit du gîte
            $query = "SELECT tarifs FROM Gîtes WHERE Id_Gîtes = :giteId";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':giteId', $giteId);
            $statement->execute();
            $tarifParNuit = $statement->fetchColumn(); // Récupérer le tarif par nuit du gîte
    
            // Calculer le nombre de nuits entre la date d'arrivée et la date de départ
            $dateArrivee = new DateTime($date_arrivee);
            $dateDepart = new DateTime($date_depart);
            $diff = $dateDepart->diff($dateArrivee);
            $nombreNuits = $diff->days;
    
            // Calculer le prix total de la réservation
            $prixTotal = $tarifParNuit * $nombreNuits;
    
            // Requête SQL pour insérer la réservation dans la table des réservations
            $queryInsert = "INSERT INTO Réservation (date_arrivee, date_depart, nombre_personnes, prix_total, Id_Utilisateur, Id_Gîtes) 
                            VALUES (:date_arrivee, :date_depart, :nbPersonnes, :prixTotal, :userId, :giteId)";
            $statementInsert = $connexion->prepare($queryInsert);
            $statementInsert->bindParam(':date_arrivee', $date_arrivee);
            $statementInsert->bindParam(':date_depart', $date_depart);
            $statementInsert->bindParam(':nbPersonnes', $nbPersonnes);
            $statementInsert->bindParam(':prixTotal', $prixTotal);
            $statementInsert->bindParam(':userId', $userId);
            $statementInsert->bindParam(':giteId', $giteId);
            $statementInsert->execute();
    
            // Récupérer l'ID de la dernière réservation insérée
            $reservation_id = $connexion->lastInsertId();
    
            // Créer un nouvel objet Reservation avec les données insérées dans la base de données
            $reservation = new Reservation(
                $date_arrivee,
                $date_depart,
                $userId,
                $giteId,
                $nbPersonnes
            );
            $reservation->setReservationId($reservation_id);
            $reservation->setPrixTotal($prixTotal);
    
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

    public static function getAllReservations($userId) {
        // Connexion à la base de données
        $connexion = Database::getInstance();

        try {
            // Requête SQL pour récupérer toutes les réservations
            $query = "SELECT Réservation.*, Gîtes.nom_gite 
            FROM Réservation 
            INNER JOIN Gîtes ON Réservation.Id_Gîtes = Gîtes.Id_Gîtes 
            WHERE Réservation.Id_Utilisateur = :userId";
            $statement = $connexion->prepare($query);
            $statement->bindParam(':userId', $userId);
            $statement->execute();

            // Récupérer toutes les réservations sous forme de tableau associatif
            $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Retourner les réservations
            return $reservations;
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur lors de la récupération des réservations : " . $e->getMessage();
            return false;
        }
    }
    
}