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
    require_once '../models/ajout_gite.php'; // Assurez-vous que le chemin d'accès est correct

    echo "<h2>Détails de votre gîte</h2><br>";
    // Récupérer l'ID du gîte depuis l'URL
    $giteId = $_GET['id'];

    // Récupérer les détails du gîte en fonction de son ID
    $giteDetails = Gites::getGiteById($giteId);
    
    // Vérifier si le gîte existe
        if ($giteDetails) {
            // Afficher les détails du gîte
            echo "<div class='container'>";
            // Afficher les images du gîte
            foreach ($giteDetails['images'] as $imagePath) {
                echo "<img src='" . $imagePath . "' alt='Image du Gîte'><br><br>";
            }        
            
        
        } else {
            // Afficher un message si le gîte n'existe pas
            echo "Ce gîte n'existe pas.";
        }
        echo "<br>";
        echo "<p>Nom du gîte: " . $giteDetails['nom_gite'] . "</p>";
        echo "<p>Région: " . $giteDetails['region'] . "</p>";
        echo "<p>Localisation: " . $giteDetails['localisation'] . "</p>";
        echo "<p>Capacité: " . $giteDetails['capacite'] . " personnes</p>";
        echo "<p>Description: " . $giteDetails['descriptif'] . "</p>";
        echo "<p>Tarifs: " . $giteDetails['tarifs'] . "€</p>";
        echo "<a href='../views/modifier_gite.php?id=" . $giteId . "'>Modifier le Gîte</a><br>";
        echo "</div>";
    ?>
</body>
</html>
