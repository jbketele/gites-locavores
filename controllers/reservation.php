<?php
require_once '../models/ajout_gite.php';
require_once '../models/user.php';
require_once '../models/database.php';
require_once '../models/reservation.php'; 

session_start();

// Constantes pour les messages d'erreur
define('ERROR_MISSING_DATA', "Erreur: Les données du formulaire sont manquantes.");
define('ERROR_RESERVATION_FAILED', "Erreur: Impossible de créer la réservation.");
define('ERROR_RESERVATION_DETAILS', "Erreur: Les détails de la réservation ne sont pas disponibles.");
define('ERROR_REDIRECT', "Location: ../views/error.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: ../views/connexion.php");
    exit;
}

// Vérifier si les données du formulaire sont soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que les données du formulaire sont définies avant de les utiliser
    if (isset($_POST['user_id'], $_POST['gite_id'], $_POST['date_arrivee'], $_POST['date_depart'], $_POST['nb_personnes'])) {
        // Récupérer les données du formulaire
        $userId = $_POST['user_id'];
        $giteId = $_POST['gite_id'];
        $date_arrivee = $_POST['date_arrivee'];
        $date_depart = $_POST['date_depart'];
        $nbPersonnes = $_POST['nb_personnes'];

        // Créer la réservation
        $reservation = Reservation::reserverGite($giteId, $userId, $date_arrivee, $date_depart, $nbPersonnes);

        // Vérifier si la réservation a été créée avec succès
        if ($reservation) {
            $reservationId = $reservation->getReservationId();

            // Récupérer le prix total de la réservation
            $prixTotal = $reservation->getPrixTotal();

            // Récupérer les détails de la réservation depuis la base de données
            $reservation_details = Reservation::getReservationDetailsById($reservationId);

            // Vérifier si les détails de la réservation ont été récupérés avec succès
            if ($reservation_details) {
                // Assigner les détails à des variables pour les utiliser dans la vue
                $nom_gite = $reservation_details['nom_gite'];
                $date_arrivee = $reservation_details['date_arrivee'];
                $date_depart = $reservation_details['date_depart'];
                $nbPersonnes = $reservation_details['nombre_personnes'];


                // Rediriger l'utilisateur vers la page de confirmation de réservation avec l'ID de la réservation dans l'URL
                header("Location: ../views/confirmation_reservation.php?nom_gite=$nom_gite&date_arrivee=$date_arrivee&date_depart=$date_depart&nb_pers=$nbPersonnes&prixTotal=$prixTotal");
                exit;

            } else {
                // Afficher un message d'erreur
                header(ERROR_REDIRECT);
                exit;
            }
        } else {
            // Afficher un message d'erreur
            header(ERROR_REDIRECT);
            exit;
        }
    } else {
        // Afficher un message d'erreur
        echo ERROR_MISSING_DATA;
    }
}        

?>
