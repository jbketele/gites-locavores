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
    require_once '../header-footer/header.php';
    $userId = $_GET['id'];
    $user = Utilisateur::getUserById($userId);

    ?>
    <div class="container">
    <h1>Modifier Votre Compte</h1>
    <form action="../controllers/modifier-user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $userId; ?>">

        <label for="lastname">Nom:</label>
        <input type="text" id="nom" name="lastname" value="<?php echo $user['Nom']; ?>"><br>

        <label for="firstname">Prénom:</label>
        <input type="text" id="nom" name="firstname" value="<?php echo $user['Prénom']; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>"><br>

        <label for="tel">Autre Champ:</label>
        <input type="text" id="tel" name="tel" value="<?php echo $user['Tel']; ?>"><br>

        <input type="submit" name="modifier_user" value="Modifier">
    </form>
    </div>
</body>
</html>
