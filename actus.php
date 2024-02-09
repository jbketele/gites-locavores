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
    <title>Gites Locavores - Actus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php require_once('header-footer/header.php'); ?>

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
                    <img src="img/654a33fe1116a512729429.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chaque avis compte ! N'hésitez pas à nous partagez le vôtre !</h5>
                        <p class="card-text">Chaque avis est important ! Voici un exemple d'avis reçu cette semaine ...
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/6567139f9c967820700071.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Coup de Pouce : Ferme de Janine et Denis dans le Calvados</h5>
                        <p class="card-text">(Coup de Pouce) 🐮 Janine et Denis Langlais proposent dans leur ferme normande des produits laitiers 100% Bio et de la viande ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/65687cface297532006431.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tournage TF1 de la Recette de Filet de Truite à la Normande pour les fêtes chez Maison Lefèvre !</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/655621d692388766238543.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CATALOGUE DES FÊTES 2023</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut pharetra sit amet aliquam id diam.
                        </p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/656496bf447ba477103428.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Marché de Noël à Dozulé le 8 décembre</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut pharetra sit amet aliquam id diam.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>

                <div class="container card-blog border-light shadow-lg col-md-4">
                    <img src="img/6551e56d119fa581493692-copie.jpeg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Des coffrets gourmands 100% produits de la ferme</h5>
                        <p class="card-text">Coffrets gourmands Gites Locavores, une bonne idée pour faire plaisir à vos proches. Composez des coffrets gourmands de produits de la Normandie ...</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once('header-footer/footer.php'); ?>

</body>

</html>