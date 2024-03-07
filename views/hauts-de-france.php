<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gîtes des Hauts de France</title>
</head>
<body>
    <?php 
    require_once '../controllers/liste-gite.php';
    ?>    
    <h1>Gîtes des Hauts de France</h1>
    <ul>
        <?php foreach ($gitesHdf as $gite) : ?>
            <li>
                <h2><?php echo $gite['nom_gite']; ?></h2>
                <p>Région: <?php echo $gite['region']; ?></p>
                <p>Localisation: <?php echo $gite['localisation']; ?></p>
                <p>Capacité: <?php echo $gite['capacite']; ?></p>
                <!-- Ajoutez d'autres détails du gîte au besoin -->
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
