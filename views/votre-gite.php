<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Gîte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    
    <?php
    session_start();
    require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header-hote.php'); 
    require_once '../models/ajout_gite.php';
    require_once '../models/reservation.php';


    // Récupérer l'ID du gîte depuis l'URL
    $giteId = $_GET['id'];

    // Récupérer les détails du gîte en fonction de son ID
    $giteDetails = Gites::getGiteById($giteId);

    if ($giteDetails['region'] === 'normandie') {
        $region = "Normandie";
    } elseif ($giteDetails['region'] === 'hauts de france') {
        $region = "Hauts de France";
    } elseif ($giteDetails['region'] === 'hauts de france') {
        $region = "Hauts de France";
    }elseif ($giteDetails['region'] === 'paca') {
        $region = "Provence-Alpes-Côte d'Azur";
    }else $region = $giteDetails['region'];

    // Vérifier si le gîte existe
        if ($giteDetails) {
            echo "<div class='ms-5'>";
            echo "<h2 class='p-0'>" . $giteDetails['nom_gite'] . "</h2>";
            echo "<h4>" . $giteDetails['localisation'] . " - " . $region . "</h4>";

            // Afficher les détails du gîte
            echo "<div class='d-flex justify-content-between'>";
            // Afficher les images du gîte
            foreach ($giteDetails['images'] as $imagePath) {
                echo "<img src='" . $imagePath . "' alt='Image du Gîte'><br><br>";
            }
            echo "</div>";     
            
        
        } else {
            // Afficher un message si le gîte n'existe pas
            echo "Ce gîte n'existe pas.";
        }
        echo "<br>";
        echo "<p>Capacité : " . $giteDetails['capacite'] . " personnes</p>";
        echo "<p class='txt-gite'>Description : <br>" . $giteDetails['descriptif'] . "</p>";
        echo "<p>Tarifs : " . $giteDetails['tarifs'] . "€</p>";
        echo "<a href='../views/modifier_gite.php?id=" . $giteId . "'>Modifier le Gîte</a><br>";
        echo "</div>";
    ?>
<br>
<h2>Réservations</h2>
    <div class="ms-5">

    <?php
        $reservations = Reservation::getReservationsByGiteId($giteId);
    if (!empty($reservations)) {
        ?>
        <table>
                <thead>
                    <tr>
                        <th>Date d'arrivée</th>
                        <th>Date de départ</th>
                        <th>Nombre de personnes</th>
                        <th>Prix Total</th>
                        <th>Nom</th>

                        <!-- Ajoutez d'autres colonnes au besoin -->
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($reservations as $reservation) {
            $prixTotalFormate = number_format($reservation['prix_total'], 0, ',', ' ');
        ?>

        <tr>
        <td><?php echo date("d/m/Y", strtotime($reservation['date_arrivee'])) ; ?></td>
        <td><?php echo date("d/m/Y", strtotime($reservation['date_depart'])) ; ?></td>
        <td><?php echo $reservation['nombre_personnes']; ?></td>
        <td><?php echo $prixTotalFormate . " €"; ?></td>
        <td><?php echo $reservation['nom_utilisateur']; ?></td>

                    <!-- Ajoutez d'autres cellules au besoin -->
        </tr>
        <?php 
        }
    } else {
        echo "<p>Aucune réservation pour ce gîte.</p>";
    }
    ?>
    <br>
</div>
    </tbody>
   </table>
   </div>
   <?php
    require_once '../header-footer/footer.php';
    ?>
</body>
</html>
