<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Gîtes par Région</title>
</head>
<body>
    <?php
    require_once '../controllers/liste-gite.php';
    echo $_GET['region'];
    ?>
    <h1>Liste des Gîtes par Région</h1>

    <?
    if (isset($_GET['region'])) {
    $region = $_GET['region'];
    echo "Region: $region"; // Vérifiez si la région est correctement récupérée
}
?>
    <?php if (isset($gitesNormandie)) : ?>
    <h2>Normandie</h2>
    <ul>
        <?php foreach ($gitesNormandie as $gite) : ?>
        <li><?php echo $gite['nom_gite']; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <?php if (isset($gitesHdf)) : ?>
    <h2>Hauts de France</h2>
    <ul>
        <?php foreach ($gitesHdf as $gite) : ?>
        <li><?php echo $gite['nom_gite']; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</body>
</html>
