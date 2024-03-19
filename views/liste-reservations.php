<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Réservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <?php
    require_once '../controllers/liste-reservations.php';
    require_once '../header-footer/header.php';
    ?>
    <div class="container">
    <h1>Vos réservations</h1>
    <table>
        <thead>
            <tr>
                <th>Gîte</th>
                <th>Date d'arrivée</th>
                <th>Date de départ</th>
                <th>Nombre de personnes</th>
                <th>Prix Total</th>

                <!-- Ajoutez d'autres colonnes au besoin -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): 
                $prixTotalFormate = number_format($reservation['Prix_Total'], 0, ',', ' ');
            ?>
                
                <tr>
                    <td><?php echo $reservation['nom_gite']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($reservation['date_arrivee'])) ; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($reservation['date_depart'])) ; ?></td>
                    <td><?php echo $reservation['nombre_personnes']; ?></td>
                    <td><?php echo $prixTotalFormate . " €"; ?></td>

                    <!-- Ajoutez d'autres cellules au besoin -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>
