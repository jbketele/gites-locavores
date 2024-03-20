<?php
require_once '../models/user.php'; // Inclure le modèle d'utilisateur

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

// Récupérer l'ID de l'utilisateur connecté
$userId = Utilisateur::getCurrentUserId();

// Vérifier si les données du formulaire sont soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_user'])) {
    // Récupérer les données soumises par l'utilisateur depuis le formulaire de modification
    $id = $_POST['id'];
    $new_lastname = $_POST['lastname'];
    $new_firstname = $_POST['firstname'];
    $new_email = $_POST['email'];
    $new_tel = $_POST['tel'];

    $user = new Utilisateur();
    // Mettre à jour les informations de l'utilisateur dans la base de données
    $user->updateUser();
        // Rediriger l'utilisateur vers la page de confirmation ou une autre page après la modification réussie
        //header("Location: ../views/votre-compte.php?id=$id");
        exit;
  
}
?>
