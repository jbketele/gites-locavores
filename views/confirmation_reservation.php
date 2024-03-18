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
require_once '../header-footer/header.php';


    if (isset($_GET['nom_gite'], $_GET['date_arrivee'], $_GET['date_depart'], $_GET['nb_pers'])) {
    // Récupérer les valeurs des paramètres GET
    $nom_gite = $_GET['nom_gite'];
    $date_arrivee = $_GET['date_arrivee'];
    $date_depart = $_GET['date_depart'];
    $nb_personnes = $_GET['nb_pers'];
    // Afficher les détails de la réservation
    echo "<h1>Confirmation de Réservation</h1>";
    echo "<p>Merci pour votre réservation!</p>";
    echo "<p>Voici les détails de votre réservation :</p>";
    echo "<ul>";
    echo "<li>Gîte : $nom_gite</li>";
    echo "<li>Date d'arrivée : $date_arrivee</li>";
    echo "<li>Date de départ : $date_depart</li>";
    echo "<li>Nombre de personnes : $nb_personnes</li>";
    // Ajouter d'autres détails de réservation au besoin
    echo "</ul>";
    echo "<p>Un email de confirmation vous sera envoyé sous peu.</p>";
} else {
    // Si les variables ne sont pas définies, afficher un message d'erreur
    echo "Erreur : Les détails de la réservation sont manquants.";
}
?>
</body>
</html>
