<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MZH9X7TZ0V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-MZH9X7TZ0V');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gites Locavores - Détails</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <?php
    require_once '../controllers/details_gite.php';
     if (isset($_SESSION['email'])) {
        $user_id = $_SESSION['user_id'];
        $user_type = Utilisateur::getUserTypeById($user_id);
        if ($user_type === 'hôte') {
            include '../header-footer/header-hote.php'; // Inclure le header pour l'hôte
        } elseif ($user_type === 'visiteur') {
            include '../header-footer/header-connect.php'; // Inclure le header pour le visiteur connecté
        }
    }?>
    

    <div class="ms-5">
        <!-- Afficher les détails du gîte -->
        <h2><?php echo $gite['nom_gite']; ?></h2>
        <h3><?php echo $gite['Prénom'] . " " . $gite['Nom']; ?></h3>
        <div class="gallery">
            <?php foreach ($gite['images'] as $imagePath) : ?>
                <img src="<?php echo $imagePath; ?>" alt="Image du Gîte">
            <?php endforeach; ?>
        </div>
        <br>
        <p>Région : <?php echo $gite['region']; ?></p>
        <p>Localisation : <?php echo $gite['localisation']; ?></p>
        <p>Prix : <?php echo $gite['tarifs']; ?> €</p>
        <p><?php echo $gite['descriptif']; ?></p>   
        <?php
        // Vérifiez si l'utilisateur est connecté
        if (isset($_SESSION['email'])) {
            // L'utilisateur est connecté, affichez le formulaire de réservation
            echo "<button class='btn-success ' id='reservationBtn'>Réserver</button>";

        } else {
            // L'utilisateur n'est pas connecté, affichez un lien vers la page de connexion
            echo '<a href="../views/inscription.php">Connectez-vous pour réserver</a>';
        }
        ?>

        <!-- Formulaire de réservation (initiallement caché) -->
        <div id="reservationForm" style="display: none;">
            <form method="POST" action="../controllers/reservation.php" >

                <!-- Champ de saisie pour la date d'arrivée -->
                <label for="date_arrivee">Date d'arrivée :</label>
                <input type="date" id="date_arrivee" name="date_arrivee" required>

                <!-- Champ de saisie pour la date de départ -->
                <label for="date_depart">Date de départ :</label>
                <input type="date" id="date_depart" name="date_depart" value="" required>

                <label for="nb_personnes">Nombre de personnes :</label>
                <input type="number" id="nb_personnes" name="nb_personnes" value="" required>
                
                <!-- Champ caché pour le nom de l'utilisateur connecté -->
                <?php $user_id = $_SESSION['user_id']; ?>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">    
                
                <?php $gite_id = $gite['Id_Gîtes']; ?>
                <input type="hidden" name="gite_id" value="<?php echo $gite_id; ?>">


                <!-- Bouton de soumission du formulaire -->
                <input type="submit" name="submit_reservation" value="Réserver"></input>
            </form>
        </div>
    </div>

    <?php
    require_once '../header-footer/footer.php';
    ?>

    <script>
    // Lorsque le bouton "Réserver" est cliqué
    document.getElementById('reservationBtn').addEventListener('click', function() {
        // Afficher le formulaire de réservation
        document.getElementById('reservationForm').style.display = 'block';
    });
</script>
</body>
</html>
