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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php require_once(__DIR__ . '/header.php'); ?>


    <main>
        <div id="map"></div>

        <section>
            <div class="list-gites">
                <div class="container col-md-2 filter" style="float: left;">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="group-content">
                            <div class="input text">
                                <label for="input_q">Mots clés</label>
                                <input type="text" id="filterInput" placeholder="Filtre">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-checkbox" type="checkbox" data-location="Aisne (02)">
                                <label class="form-check-label">
                                    Aisne (02)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-checkbox" type="checkbox" data-location="Nord (59)">
                                <label class="form-check-label">
                                    Nord (59)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-checkbox" type="checkbox" data-location="Pas de Calais (62)">
                                <label class="form-check-label">
                                    Pas de Calais (62)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-checkbox" type="checkbox" data-location="Oise (60)">
                                <label class="form-check-label">
                                    Oise (60)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-checkbox" type="checkbox" data-location="Somme (80)">
                                <label class="form-check-label">
                                    Somme (80)
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="group-name">
                            <h5>Séjours thémathiques</h5>
                        </div>
                        <div class="group-content">
                            <div class="form-check">
                                <input class="form-check-input filter-checkbox" type="checkbox">
                                <label class="form-check-label">
                                    Logement insolite
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filter-checkbox" type="checkbox">
                                <label class="form-check-label">
                                    Chambres d'hôtes
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="container col-md-10 cards" id="gitesList">
    <?php
    // Première carte
    $farm1_name = "LA FERME DE M. SEGUIN";
    $host1_name = "Écric DUPONT";
    $location1 = "Marly-Gomont (02)";
    $description1 = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.";
    ?>
    <div class="card mb-3" data-location="Aisne (02)" data-category="Chambres d'hôtes" id="gitesCard">
        <div class="card-header">Producteur</div>
        <div class="card-body text-white" id="gite_card">
            <img src="img/rural-life-concept-with-farm-animals.jpg" style="float: left; margin-right: 2rem;">
            <h3 class="card-title" id="farm"><?php echo $farm1_name; ?></h3>
            <h4 id="nameHost"><?php echo $host1_name; ?></h4>
            <p id="place"><?php echo $location1; ?></p>
            <p class="card-text"><?php echo $description1; ?></p>
            <div class="d-flex justify-content-end"><a href="fiche_gite.php" class="text-success btn btn-light">Lire plus</a></div>
        </div>
    </div>

    <?php
    // Deuxième carte
    $farm2_name = "GAEC des Marais";
    $host2_name = "David VAN DE BRUCK";
    $location2 = "Seclin (59)";
    $description2 = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.";
    ?>
    <div class="card mb-3" data-location="Nord (59)" data-category="Chambres d'hôtes" id="gitesCard">
        <div class="card-header">Producteur</div>
        <div class="card-body text-white bg-success">
            <img src="img/farmer-cowshed-looking-after-cows.jpg" style="float: left; margin-right: 2rem;">
            <h3 class="card-title" id="farm"><?php echo $farm2_name; ?></h3>
            <h4 id="nameHost"><?php echo $host2_name; ?></h4>
            <p id="place"><?php echo $location2; ?></p>
            <p class="card-text"><?php echo $description2; ?></p>
            <div class="d-flex justify-content-end"><a href="" class="text-success btn btn-light">Lire plus</a></div>
        </div>
    </div>

    <?php
    // Troisième carte
    $farm3_name = "SCEA DE LA SABLIÈRE";
    $host3_name = "Jean LECLERC";
    $location3 = "Conty (80)";
    $description3 = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.";
    ?>
    <div class="card" data-location="Somme (80)" data-category="Chambres d'hôtes" id="gitesCard">
        <div class="card-header">Producteur</div>
        <div class="card-body text-white bg-success">
            <img src="img/country-lifestyle-concept-hens-nest.jpg" style="float: left; margin-right: 2rem;">
            <h3 class="card-title" id="farm"><?php echo $farm3_name; ?></h3>
            <h4 id="nameHost"><?php echo $host3_name; ?></h4>
            <p id="place"><?php echo $location3; ?></p>
            <p class="card-text"><?php echo $description3; ?></p>
            <div class="d-flex justify-content-end"><a href="" class="text-success btn btn-light">Lire plus</a></div>
        </div>
    </div>
</div>


            </div>
        </section>
    </main>


    
    <?php require_once(__DIR__ . '/footer.php'); ?>

    <script src="main.js"></script>
</body>

</html>