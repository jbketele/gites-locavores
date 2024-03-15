<?php
require_once '../models/ajout_gite.php';
require_once '../models/user.php';
require_once '../models/database.php';
require_once '../models/reservation.php'; // Inclure la classe Reservation

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../views/connexion.php");
    exit;
}

// Vérifier si les données du formulaire sont soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que les données du formulaire sont définies avant de les utiliser
    if (isset($_POST['user_id'], $_POST['gite_id'], $_POST['date_arrivee'], $_POST['date_depart'])) {
        // Récupérer les données du formulaire
        $userId = $_POST['user_id'];
        $giteId = $_POST['gite_id'];
        $date_arrivee = $_POST['date_arrivee'];
        $date_depart = $_POST['date_depart'];

        // Créer la réservation
        $reservation = Reservation::reserverGite($giteId, $userId, $date_arrivee, $date_depart);

        // Vérifier si la réservation a été créée avec succès
        if ($reservation) {
            $reservationId = $reservation->getReservationId();

            // Récupérer les détails de la réservation depuis la base de données
            $reservation_details = Reservation::getReservationDetailsById($reservationId);

            // Vérifier si les détails de la réservation ont été récupérés avec succès
            if ($reservation_details) {
                // Les détails de la réservation ont été récupérés avec succès
                // Assigner les détails à des variables pour les utiliser dans la vue
                $nom_gite = $reservation_details['nom_gite'];
                $date_arrivee = $reservation_details['date_arrivee'];
                $date_depart = $reservation_details['date_depart'];
            } else {
                // Les détails de la réservation n'ont pas pu être récupérés
                // Afficher un message d'erreur ou rediriger vers une page d'erreur
                echo "Erreur: Les détails de la réservation ne sont pas disponibles.";
                exit;
            }

            // Rediriger l'utilisateur vers la page de confirmation de réservation avec l'ID de la réservation dans l'URL
            header("Location: ../views/confirmation_reservation.php?id=$reservationId");
            exit;
        } else {
            // La réservation n'a pas pu être créée
            // Afficher un message d'erreur ou rediriger vers une page d'erreur
            echo "Erreur: Impossible de créer la réservation.";
            exit;
        }
    } else {
        // Afficher un message d'erreur si les données du formulaire ne sont pas définies
        echo "Erreur: Les données du formulaire sont manquantes.";
    }
}        

?>
