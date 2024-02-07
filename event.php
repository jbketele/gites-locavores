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
    <title>Gites Locavores - Évènements</title>
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
                    <img src="img/pub_noel_gites_locavores.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Profitez de nos chalets pendant les fêtes !</h5>
                        <p class="card-text">Passez un moment en famille unique dans nos chalets et découvrez les saveurs des spécialités montagnardes ...
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/65546a2e98557988646525.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> VENTE DE SAPINS</h5>
                        <p class="card-text">Vente de sapins à partir du 2 décembre 2023. Quantité limitée.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/652542e3a2a67183224928.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">À Noël, partez à la découverte des vignes du Vermandois</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/61605a42736e9115570806-copie.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Marché de Noël et ferme en fête chez Les Chèvres de M. Seguin</h5>
                        <p class="card-text">Pour Noël, venez chez Les Chèvres de M. Seguin à Hautain : Samedis 9 et 16 décembre, Dimanches 10 et 17 décembre De 9h30 à 18h ...
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/65577a82076c4095375992.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Atelier Créatifs de Noël 2023</h5>
                        <p class="card-text">Créer votre couronne de Noël et vos guirlandes de sapin. Une astuce pour une décoration intérieure et extérieure ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/655cbb90f1bbe735862856.png" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">OFFRE DE NOEL 10%</h5>
                        <p class="card-text">Venez découvrir toutes nos gammes déclinées en blanc, rosé et rouge ainsi que nos effervescent. Nous avons le plaisir de vous offrir 10% de réduction sur ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once(__DIR__ . '/footer.php'); ?>

</body>

</html>