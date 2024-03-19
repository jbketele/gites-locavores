<?php
require_once '../models/database.php';
require_once '../models/reservation.php';
session_start();
$userId = $_SESSION['user_id'];
// Récupérer toutes les réservations depuis la base de données
$reservations = Reservation::getAllReservations($userId);


?>
