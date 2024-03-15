<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<?php
require_once '../controllers/reservation.php';
     if (isset($_SESSION['email'])) {
        // L'utilisateur est connecté, affichez le formulaire de réservation
        require_once '/Applications/MAMP/htdocs/gites_locavores/header-footer/header-connect.php';
    } else {
        // L'utilisateur n'est pas connecté, affichez un lien vers la page de connexion
        require_once '/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php';
    }
    // Vérifier si l'ID de la réservation est passé dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID de la réservation depuis l'URL
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
    // L'ID de la réservation n'est pas passé dans l'URL
    // Afficher un message d'erreur ou rediriger vers une page d'erreur
    echo "Erreur: ID de réservation manquant dans l'URL.";
    exit;
}
    ?>
    <h1>Confirmation de Réservation</h1>
    <p>Merci pour votre réservation!</p>
    <p>Voici les détails de votre réservation :</p>
    
    <ul>
        <li>Gîte : <?php echo $nom_gite; ?></li>
        <li>Date d'arrivée : <?php echo date_format(date_create($date_arrivee), 'd/m/Y'); ?></li>
        <li>Date de départ : <?php echo date_format(date_create($date_depart), 'd/m/Y'); ?></li>
        <!-- Ajoutez d'autres détails de réservation au besoin -->
    </ul>
    
    <p>Un email de confirmation vous sera envoyé sous peu.</p>
</body>
</html>
