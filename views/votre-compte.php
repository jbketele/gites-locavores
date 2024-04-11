<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Compte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <!-- Styles CSS et autres ressources -->
</head>
<body>
    <?php session_start();
    require_once '../controllers/compte.php';
    require_once '../header-footer/header.php';
    ?>
    <div class="container">
    <h1>Votre Compte</h1>
    <div>
        <p>Nom: <?php echo $user['Nom']; ?></p>
        <p>Prénom: <?php echo $user['Prénom']; ?></p>
        <p>Email: <?php echo $user['Email']; ?></p>
        <p>Téléphone: <?php echo $user['Tel']; ?></p>
        <?php
        echo "<a href='modifier-user.php?id=" . $userId . "'>Modifier mes informations</a>"
?>
        <!-- Ajoutez d'autres champs d'information du compte au besoin -->
    </div>
    </div>
    <?php require_once '../header-footer/footer.php' ?>
</body>
</html>
