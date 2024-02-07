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
    <title>Gites Locavores - Produits de saison</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php require_once(__DIR__ . '/header.php'); ?>


    <main>
        <div class="d-flex justify-content-evenly pt-3">
            <a href="event.php" class="btn btn-warning">Évènements</a>
            <a href="actus.php" class="btn btn-warning">Actualités</a>
            <a href="recettes.php" class="btn btn-warning">Recettes</a>
            <a href="produits-saison.php" class="btn btn-warning">Produits de saison</a>
        </div>
        <section>
            <div class="row-cols-1 row-cols-md-3 cards-blog">
                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/5e4d3f833639a044200785.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La clémentine de Corse, unique et dynamisante !</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/pexels-zen-chung-5529540.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La pomme, un fruit aux multiples saveurs !</h5>
                        <p class="card-text">Découvrez les différentes variétés de pommes cultivées chez nos
                            agriculteurs, et des recettes savoureuses ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/5e4d4b3e731c9362699544.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La mâche, une élégante valeur sûre</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut pharetra sit amet aliquam id diam.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/5e4d49827a964177551332.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Le kiwi, un grand voyageur devenu made in France</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/60994cb671913953653688.png" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La truffe, le diamant des forêts françaises</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/6099447320d6d477693201.png" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La courge butternut, fidèle à ses promesses</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut pharetra sit amet aliquam id diam.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once(__DIR__ . '/footer.php'); ?>

</body>

</html>