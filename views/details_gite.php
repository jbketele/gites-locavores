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
    require_once '/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php';
    ?>

    <div class="container">
    <!-- Afficher les détails du gîte -->
    <h2><?php echo $gite['nom_gite']; ?></h2>
    <div class="gallery">
        <?php foreach ($gite['images'] as $imagePath) : ?>
            <img src="<?php echo $imagePath; ?>" alt="Image du Gîte">
        <?php endforeach; ?>
    </div>
    <br>
    <p>Région : <?php echo $gite['region']; ?></p>
    <p>Localisation : <?php echo $gite['localisation']; ?></p>
    <p>Prix : <?php echo $gite['tarifs']; ?></p>
    <p><?php echo $gite['descriptif']; ?></p>   
    </div>

</body>
</html>
