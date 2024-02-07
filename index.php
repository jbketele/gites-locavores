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
    <title>Gites Locavores - Accueil</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>


    <!--NAVBAR-->
    <?php require_once(__DIR__ . '/header.php'); ?>

    <main>

        <!--SEARCH-->
        <form class="search">
            <div class="container box1">
                <div class="row">
                    <div class="container row place-products">
                        <div class="container row col-md-5 search-container ">
                            <input type="text" id="place" name="localisation" placeholder="Où souhaitez vous aller ?">
                        </div>

                        <div class="container row col-md-2 suivant">
                            <input class="item" type="submit" value="Suivant">
                        </div>
                    </div>
                </div>
                
            </div>
        </form>

        <section class="top">
            <div class="container couv" style="padding: 0%;">
            <h1 class="text-dark text-center texte-couv"><em>Détente/Découverte<br>Dégustation</em></h1>
            
            </div>
        </section>
        <br>

        <!--CARDS BLOG-->
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
                    <img src="img/pexels-zen-chung-5529540.jpg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">La pomme, un fruit aux multiples saveurs !</h5>
                        <p class="card-text">Découvrez les différentes variétés de pommes cultivées chez nos
                            agriculteurs, et des recettes savoureuses ...</p>
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
                    <img src="img/pub_noel_gites_locavores.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Profitez de nos chalets pendant les fêtes !</h5>
                        <p class="card-text">Passez un moment en famille unique dans nos chalets et découvrez les saveurs des spécialités montagnardes ...
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
                    <img src="img/63bf03d6d30b9248784608.jpeg" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Recette de la Teurgoule</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
            </div>
        </section>
        <br>

        <section class="other-cards">
            <div class="container-fluid d-flex justify-content-center">
                <a href="event.php" class="btn-success btn-lg mt-5 mb-5">Et bien d'autres...</a>
            </div>
        </section>
    </main>

    <!--FOOTER-->
    <?php require_once(__DIR__ . '/footer.php'); ?>


    <script src="main.js"></script>

</body>

</html>