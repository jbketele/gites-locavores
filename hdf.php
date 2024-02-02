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
                    <div class="card mb-3" data-location="Aisne (02)" data-category="Chambres d'hôtes" id="gitesCard">
                        <div class="card-header">Producteur</div>
                        <div class="card-body text-white" id="gite_card">
                            <img src="img/rural-life-concept-with-farm-animals.jpg"
                                style="float: left; margin-right: 2rem;">
                            <h3 class="card-title" id="farm">LA FERME DE M. SEGUIN</h3>
                            <h4 id="nameHost">Écric DUPONT</h4>
                            <p id="place">Marly-Gomont (02)</p>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem
                                libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga
                                excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.</p>
                            <div class="d-flex justify-content-end"><a href="fiche_gite.php"
                                    class="text-success btn btn-light">Lire
                                    plus</a></div>
                        </div>
                    </div>

                    <div class="card mb-3" data-location="Nord (59)" data-category="Chambres d'hôtes" id="gitesCard">
                        <div class="card-header">Producteur</div>
                        <div class="card-body text-white bg-success">
                            <img src="img/farmer-cowshed-looking-after-cows.jpg"
                                style="float: left; margin-right: 2rem;">
                            <h3 class="card-title" id="farm">GAEC des Marais</h3>
                            <h4 id="nameHost">David VAN DE BRUCK</h4>
                            <p id="place">Seclin (59)</p>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem
                                libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga
                                excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.</p>
                            <div class="d-flex justify-content-end"><a href="" class="text-success btn btn-light">Lire
                                    plus</a></div>
                        </div>
                    </div>

                    <div class="card" data-location="Somme (80)" data-category="Chambres d'hôtes" id="gitesCard">
                        <div class="card-header">Producteur</div>
                        <div class="card-body text-white bg-success">
                            <img src="img/country-lifestyle-concept-hens-nest.jpg"
                                style="float: left; margin-right: 2rem;">
                            <h3 class="card-title" id="farm">SCEA DE LA SABLIÈRE</h3>
                            <h4 id="nameHost">Jean LECLERC</h4>
                            <p id="place">Conty (80)</p>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem
                                libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga
                                excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.</p>
                            <div class="d-flex justify-content-end"><a href="" class="text-success btn btn-light">Lire
                                    plus</a></div>
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