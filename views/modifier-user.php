<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Votre Compte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <!-- Styles CSS et autres ressources -->
</head>
<body>
    <?php session_start();
    require_once '../controllers/check-admin.php';
    require_once '../header-footer/header-connect.php';
    require_once '../models/user.php';
    $userId = $_GET['id'];
    $user = Utilisateur::getUserById($userId);
    // Activer l'affichage des erreurs
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    ?>
    <div class="container">
    <h1>Modifier Votre Compte</h1>
        <form action="../controllers/modifier-user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $userId; ?>">

        <label for="lastname">Nom:</label>
        <input type="text" name="lastname" value="<?php echo $user['Nom']; ?>"><br>

        <label for="firstname">Prénom:</label>
        <input type="text" name="firstname" value="<?php echo $user['Prénom']; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['Email']; ?>"><br>

        <label for="tel">Téléphone:</label>
        <input type="text" name="tel" value="<?php echo $user['Tel']; ?>"><br>

        <input type="submit" >
    </form>


    </div>
</body>
</html>
