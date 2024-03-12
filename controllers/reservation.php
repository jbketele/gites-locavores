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

// Vérifier si l'ID de réservation est présent dans l'URL
if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    // Récupérer les détails de la réservation depuis la base de données
    $reservation_details = Reservation::getReservationDetailsById($reservation_id);

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
        echo "Erreur: Impossible de récupérer les détails de la réservation.";
        exit;
    }
} else {
    // L'ID de réservation n'est pas présent dans l'URL
    // Afficher un message d'erreur ou rediriger vers une page d'erreur
    echo "Erreur: ID de réservation non spécifié.";
    exit;
}

// Inclure la vue de confirmation de réservation
require_once '../views/confirmation_reservation.php';
?>
    