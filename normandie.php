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
        <section>
            <div class="list-gites">

                <div class="container col-md-2 filter" style="float: left;">
                    <div class="group-content">
                        <div class="input text">
                            <label for="input_q">Mots clés</label>
                            <input type="text" name="q" id="input_q" value="">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Calvados (14)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Eure (27)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Manche (50)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Orne (61)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Seine-maritime (76)
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="group-name">
                        <h5>Séjours thémathiques</h5>
                    </div>
                    <div class="group-content">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Logement insolite
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Chambres d'hôtes
                            </label>
                        </div>
                    </div>
                </div>

                <div class="container col-md-10 cards">
                    <div class="card mb-3">
                        <div class="card-header">Producteur</div>
                        <div class="card-body text-white bg-success">
                            <img src="img/rural-life-concept-with-farm-animals.jpg"
                                style="float: left; margin-right: 2rem;">
                            <h3 class="card-title">LA FERME DE M. SEGUIN</h3>
                            <h4>Écric DUPONT</h4>
                            <p>Yvetôt (76)</p>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem
                                libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga
                                excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.</p>
                            <div class="d-flex justify-content-end"><a href="" class="text-success btn btn-light">Lire
                                    plus</a></div>
                        </div>
                    </div>

                    <div class="card mb-3" data-aos="fade-up">
                        <div class="card-header">Producteur</div>
                        <div class="card-body text-white bg-success">
                            <img src="img/farmer-cowshed-looking-after-cows.jpg"
                                style="float: left; margin-right: 2rem;">
                            <h3 class="card-title">GAEC des Marais</h3>
                            <h4>David LE GARREC</h4>
                            <p>Condé sur Vire (50)</p>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, dolorem
                                libero? Enim necessitatibus minus ullam odio. Inventore quis, consequuntur nihil fuga
                                excepturi odit molestiae ea sit dolorem, accusamus doloremque quidem.</p>
                            <div class="d-flex justify-content-end"><a href="" class="text-success btn btn-light">Lire
                                    plus</a></div>
                        </div>
                    </div>

                    <div class="card mb-3" data-aos="fade-up">
                        <div class="card-header">Producteur</div>
                        <div class="card-body text-white bg-success">
                            <img src="img/country-lifestyle-concept-hens-nest.jpg"
                                style="float: left; margin-right: 2rem;">
                            <h3 class="card-title">SCEA DE LA SABLIÈRE</h3>
                            <h4>Jean LECLERC</h4>
                            <p>Beuzeville (27)</p>
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


    </script>
</body>

</html>