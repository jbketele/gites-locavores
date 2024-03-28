<?php
require_once '../models/user.php';

// Vérification de l'action à exécuter
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['type']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['tel'])) {
        // Ajout d'un nouvel utilisateur
        addUser();
    } elseif (isset($_POST['email']) && isset($_POST['password'])) {
        // Connexion d'un utilisateur
        login();
    }
}

function addUser() {
    // Récupération des données du formulaire
    $type = $_POST['type'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];

    // Création d'un nouvel utilisateur
    $user = new Utilisateur();
    $user->setType($type);
    $user->setLastname($lastname);
    $user->setFirstname($firstname);
    $user->setEmail($email);
    $user->setPassword($password);
    $user->setTel($tel);

    // Ajout de l'utilisateur
    $user->addUser();

    
    // Redirection vers la page de connexion
    header("Location: ../views/connexion.php");
    exit;
}

function login() {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification des informations de connexion
    $user = Utilisateur::verifyCredentials($email, $password);
    if ($user) {
        // Authentification réussie
        // Stockage de l'email dans la session
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user['Id_Utilisateur']; // Supposons que l'ID de l'utilisateur se trouve dans la colonne 'Id_Utilisateur'

  
        header("Location: ../views/index.php");
        exit;
    } else {
        // Authentification échouée
        // Affichage d'un message d'erreur
        echo "Identifiants incorrects";
    }

    // Affichage du formulaire de connexion
    include '../views/connexion.php';
}


function getCurrentUser() {
    session_start();

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $currentUser = Utilisateur::getUserByEmail($email);
        return $currentUser;
    } else {
        return null;
    }
}
?>
