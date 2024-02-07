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
                    <div class="title-box">
                        <img src="img/loupe.png" alt="loupe" style="float:left;">
                        <h4>Trouvez nos produits et découvrez nos expériences</h4>
                    </div>
                    <div class="container row place-products">
                        <div class="container row col-md-5 search-container">
                            <label class="item" for="place">Localisez-vous</label>
                            <input type="text" id="place" name="localisation" placeholder="Localisation">
                        </div>

                        <div class="container row col-md-2 suivant">
                            <input class="item" type="submit" value="Suivant">
                        </div>
                    </div>
                </div>
                <div class="shop">
                    <h4>Nos types de gîtes</h4>
                </div>
                <div class="container d-flex vente">
                    <label class="item" for="option1">Chambres d'hôtes</label>
                    <input type="checkbox" id="option1" name="option1" value="option1">

                    <label class="item" for="option2">Gîtes ruraux</label>
                    <input type="checkbox" id="option2" name="option2" value="option2">

                    <label class="item" for="option3">Gîtes de groupe</label>
                    <input type="checkbox" id="option3" name="option3" value="option3">

                    <input type="submit" value="Suivant">
                </div>
            </div>
        </form>

        <!--CAROUSSEL-->
        <section class="top">
            <div class="container" style="padding: 0%;">
                <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="4000">
                            <img src="img/gites-local.png" alt="gites ruraux" class="d-block couv w-50">
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <img src="img/produits-locaux.png" alt="" class="d-block portrait w-25">
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <img src="img/image.png" alt="" class="d-block portrait w-25">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
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