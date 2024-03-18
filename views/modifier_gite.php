<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Gîte</title>
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
    echo "<h2>Modifier Gîte</h2>";

    // Récupérer l'ID du gîte à modifier depuis l'URL
    $giteId = $_GET['id'];

    // Récupérer les détails du gîte en fonction de son ID
    $giteDetails = Gites::getGiteById($giteId);

    // Vérifier si le gîte existe
    if ($giteDetails) {
        ?>
        <div class="container">
        <form action="../controllers/modifier_gite.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $giteId; ?>"> <!-- Champ caché pour l'ID du gîte -->
            <label for="nom_gite">Nom du Gîte:</label>
            <input type="text" id="nom_gite" name="nom_gite" value="<?php echo $giteDetails['nom_gite']; ?>"><br>

            <label>Images actuelles:</label>
            <div class="gallery">
                <?php foreach ($giteDetails['images'] as $image): ?>
                    <img src="<?php echo $image; ?>" alt="Image du gîte">
                    <br>
                    <?php $imageName = basename($image); ?>
                    <input type="text" value="<?php echo $imageName; ?>" readonly>

                <?php endforeach; ?>
            </div>

            <label for="images">Nouvelles Images:</label>
            <input type="file" id="images" name="images[]" multiple accept="image/*"><br>

            <label for="region">Région:</label>
            <input type="text" id="region" name="region" value="<?php echo $giteDetails['region']; ?>"><br>

            <label for="localisation">Localisation:</label>
            <input type="text" id="localisation" name="localisation" value="<?php echo $giteDetails['localisation']; ?>"><br>

            <label for="capacite">Capacité:</label>
            <input type="text" id="capacite" name="capacite" value="<?php echo $giteDetails['capacite']; ?>"><br>

            <label for="descriptif">Descriptif:</label>
            <textarea id="descriptif" name="descriptif"><?php echo $giteDetails['descriptif']; ?></textarea><br>

            <label for="tarifs">Tarifs:</label>
            <input type="text" id="tarifs" name="tarifs" value="<?php echo $giteDetails['tarifs']; ?>"><br>

            <input type="submit" value="Enregistrer les modifications">
        </form>
        </div>
        <?php
    } else {
        // Afficher un message si le gîte n'existe pas
        echo "Ce gîte n'existe pas.";
    }
    ?>
</body>
</html>
