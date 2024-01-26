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
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php require_once(__DIR__ . '/header.php'); ?>


    <main>
        <div class="d-flex justify-content-evenly pt-3">
            <a href="event.html" class="btn btn-warning">Évènements</a>
            <a href="actus.html" class="btn btn-warning">Actualités</a>
            <a href="recettes.html" class="btn btn-warning">Recettes</a>
            <a href="produits-saison.html" class="btn btn-warning">Produits de saison</a>
        </div>
        <section>
            <div class="row-cols-1 row-cols-md-3 cards-blog">
                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/pub_noel_gites_locavores.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chaque avis compte ! N'hésitez pas à nous partagez le vôtre !</h5>
                        <p class="card-text">Chaque avis est important ! Voici un exemple d'avis reçu cette semaine ...
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/65546a2e98557988646525.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La pomme, un fruit aux multiples saveurs !</h5>
                        <p class="card-text">Découvrez les différentes variétés de pommes cultivées chez nos
                            agriculteurs, et des recettes savoureuses ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/652542e3a2a67183224928.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gnocchis de pommes de terre aux blettes</h5>
                        <p class="card-text">Plus besoin de chercher à combiner féculents et légumes, voici une recette
                            qui
                            le fait pour vous ! Goûtez à ces délicieux gnocchis de pomme de terre aux ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/61605a42736e9115570806-copie.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chaque avis compte ! N'hésitez pas à nous partagez le vôtre !</h5>
                        <p class="card-text">Chaque avis est important ! Voici un exemple d'avis reçu cette semaine ...
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/65577a82076c4095375992.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La pomme, un fruit aux multiples saveurs !</h5>
                        <p class="card-text">Découvrez les différentes variétés de pommes cultivées chez nos
                            agriculteurs, et des recettes savoureuses ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/655cbb90f1bbe735862856.png" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gnocchis de pommes de terre aux blettes</h5>
                        <p class="card-text">Plus besoin de chercher à combiner féculents et légumes, voici une recette
                            qui
                            le fait pour vous ! Goûtez à ces délicieux gnocchis de pomme de terre aux ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once(__DIR__ . '/footer.php'); ?>

</body>

</html>