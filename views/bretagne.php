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
    <title>Gites Locavores - Bretagne</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/hdf.css">
</head>
<body>
    <?php session_start();
    require_once '../controllers/liste-gite.php';
    require_once '/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php';
    ?>
    <main>
        <section>
            <div class="list-gites">
    
                <div class="conatainer">
                    <form method="post">
                        <input type="search" id="filterInput" placeholder="Mots-clés">
                    </form>  
                </div>

                <div class="container col-md-10 cards">
                <?php foreach ($gitesBretagne as $gite) : 
                        echo "<div class='card mb-3' id='gitesCard'>";
                        echo "<div class='card-header'>Producteur</div>";
                        echo "<div class='card-body text-white bg-success'>";
                            echo "<img src='" . $gite['image_path'] ."'>";
                            echo "<h3 class='card-title'>" . $gite['nom_gite'] . "</h3>";
                            echo "<h4>" . $gite['Prénom'] . " " . $gite['Nom'] . "</h4>";
                            echo "<p>" . $gite['localisation'] . "</p>";
                            echo "<p>" . $gite['capacite'] . " personnes</p>";
                            echo "<p class='card-text descriptif'>" . $gite['descriptif'] . "</p>";
                            echo "<h5>" . $gite['tarifs'] . " €/nuit</h5>";                                        
                            echo "<div class='d-flex justify-content-end'><a href='details_gite.php?id=" . $gite['Id_Gîtes'] . "' class='text-success btn btn-light'>Lire plus</a></div>";
                        echo"</div>";
                        echo "</div>";
                    endforeach; ?>
                </div>
            </div>
            <div id="map"></div>
        </section>
    </main>
    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="../js/bretagne.js"></script>
</body>
</html>

