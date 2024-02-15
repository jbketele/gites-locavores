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
    <title>Gites Locavores</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<style>
   main{
    padding-left: 2vw
   }
   .recap{
    list-style: none;
   }
</style>
<body>
    <!--NAVBAR-->
    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>

    <main>
    <?php
    // Vérifiez si les données du formulaire ont été soumises
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez les données du formulaire
        $farmName = $_POST["farm_name"];
        $hostName = $_POST["host_name"];
        $location = $_POST["location"];
        $description = $_POST["description"];

        // Affichez les données sous forme de liste de gîtes
        echo "<h2>Liste des Gîtes</h2><br>";
        echo "<div><ul class='recap'>";
        echo "<li><strong>Nom du gite:</strong> $farmName</li>";
        echo "<li><strong>hote:</strong> $hostName</li>";
        echo "<li><strong>Localisation:</strong> $location</li>";
        echo "<li><strong>Description:</strong> $description</li>";
        echo "</ul></div>";
    } else {
        // Si les données du formulaire n'ont pas été soumises, affichez un message d'erreur
        echo "<p>Aucune donnée soumise.</p>";
    }
    ?>
    </main>

    <!--FOOTER-->
    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>


</body>

</html>