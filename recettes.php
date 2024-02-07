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
    <title>Gites Locavores - Recettes</title>
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
                    <img src="img/63bf03d6d30b9248784608.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Recette de la Teurgoule</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/63da7b58ddfbd983659485.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Crêpes moelleuse et délicieuses : la recette facile !</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/60c32bd1cae0e003878780.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gnocchis de pommes de terre aux blettes</h5>
                        <p class="card-text">Plus besoin de chercher à combiner féculents et légumes, voici une recette
                            qui
                            le fait pour vous ! Goûtez à ces délicieux gnocchis de pomme de terre aux ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/638e1b67d9182531985049.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Recette des Florentins de Noël</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/614491cbeeb8b645710995.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Salade de pêches grillés, figues, jambon cru et fromage persillé</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/60d9b9bc6344e463259857.png" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Salade de haricots verts, cerises, noisettes et chèvre</h5>
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