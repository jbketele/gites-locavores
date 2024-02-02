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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    @media screen (max-width: 767px) {
        
    }

    @media screen (min-width: 767px) {
        #map {
            height: 25%;
            width: 20%;
            margin-top: 2rem;
            margin-left: 50rem;
            position: absolute;
        }
    }
    
</style>
<body>
    <!--NAVBAR-->
    <?php require_once(__DIR__ . '/header.php'); ?>


    <main class="container">
        <div>
            <nav class="nav2 navbar navbar-expand-md ps-4 ">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#description">Description</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#chambres-gites">Chambres & Gîtes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#produits-locaux">Prdouits locaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#coordonnes">Coordonées</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#avis">Avis</a>
                    </li>
            </nav>
        </div>

        <section id="description">
            <div class=" text-white description">
                <div class="texte-description">
                    <?php
                        if (isset($_GET['farm']))
                    ?>
                    <h3>La Ferme de M. Seguin</h3>
                    <h4>Éric DUPONT</h4>
                    <p>Marly-Gomont (02)</p>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam molestiae rem distinctio vel
                        rerum, quos quia nobis, numquam non sequi harum nesciunt voluptate consequuntur officiis
                        deleniti labore atque ipsum natus.</p>
                    <br>
                    <h4>Nos productions</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae eveniet, suscipit cupiditate
                        repellendus dolorem adipisci accusantium reprehenderit illum obcaecati et hic quia rerum
                        maiores. Aspernatur laborum ea sed necessitatibus totam?</p>
                    <br>
                    <h4>Nos points de vente</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, labore quia sit ipsa quas
                        neque omnis excepturi aspernatur? Ipsa optio eaque placeat obcaecati? Dolores distinctio facere
                        velit excepturi, ullam tempora!</p>
                </div>
                <div>
                    <img style="height: fit-content; width: 100%; margin: 2rem 0;"
                        src="img/rural-life-concept-with-farm-animals.jpg" alt="">
                    <br>
                    <button class="btn btn-light" id="buttonContact">Contactez-nous</button>

                    <div id="contactModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <div class="head-modal">
                                <h1 style="color: white; margin-left: 2rem;">Contactez-nous</h1>
                            </div>
                            <br>
                            <h5 style="color: black;">Une question pour le producteur/hôte ? N'hésitez pas à le
                                contacter via ce formulaire
                            </h5>
                            <br>
                            <form class="modal-form">
                                <div class="civilite">
                                    <label for="civilite">Civilité</label>
                                    <input type="radio" name="civilite" id="civil">
                                    <label for="civilite">Monsieur</label>
                                    <input type="radio" name="civilite" id="civil">
                                    <label for="civilite">Madame</label>
                                </div>
                                <div class="lastname">
                                    <label for="lastname">Nom</label>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div class="firstname">
                                    <label for="firstname">Prénom</label>
                                    <input type="text" name="firstname" id="firstname">
                                </div>
                                <div class="mail">
                                    <label for="mail">Email</label>
                                    <input type="text" name="mail" id="mail">
                                </div>
                                <div class="tel">
                                    <label for="tel">Téléphone</label>
                                    <input type="text" name="tel" id="tel">
                                </div>
                                <div class="message">
                                    <label class="message">Message</label>
                                    <textarea name="message"></textarea>
                                </div>
                                <button class="btn btn-success" type="submit">Envoyer</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section id="produits-locaux">
            <div class=" produits-locaux">
                <h4 style="padding: 2rem;">Nos produits locaux</h4>
                <div class="produits-locaux-content">
                    <div style="grid-column: 2; text-align: center;">
                        <h5>Découvrir nos produits</h5>
                        <img src="img/6551e56d119fa581493692-copie.jpeg" style="width: 100%;" alt="">
                    </div>
                    <div>
                        <h6>Produits proposés</h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis nemo praesentium esse
                            iure ad
                            vitae ipsum inventore consequuntur expedita magnam? Sunt sint dolore veniam similique
                            distinctio
                            nesciunt id, officia quasi.</p>
                        <h6>Les engagements du producteur</h6>
                        <br>
                        <h5>Achetez nos produits</h5>
                        <h6>Vente à la ferme</h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, aspernatur? A ipsa saepe dolore
                            odit
                            illo, quis quasi ullam corporis ipsam iusto aliquam id voluptatibus rerum sed voluptates
                            molestias
                            aperiam.</p>
                        <h6>Vente sur les marchés</h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor hic sint cupiditate ab quidem
                            quas
                            asperiores, omnis minima ipsam fugit quis ipsa facilis non expedita iusto saepe. Odit, rerum
                            sapiente?</p>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section id="chambres-gites">
            <div class="text-white chambres-gites">
                <div>
                    <h4 style="padding: 2rem;">Nos chambres et gîtes</h4>
                    <div class="d-flex justify-content-around align-items-center">
                        <img src="img/room-interior-design.jpg" alt="">
                        <p style="width: 50%;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi ipsam saepe
                            magnam at harum et
                            consequatur eveniet iste? Laudantium placeat corporis odio eius perferendis qui expedita
                            odit
                            cumque aliquid reiciendis?</p>
                    </div>
                    <br>
                    <div class="d-flex justify-content-around align-items-center">
                        <img src="img/room-interior-design (1).jpg" alt="">
                        <p style="width: 50%;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi ipsam saepe
                            magnam at harum et
                            consequatur eveniet iste? Laudantium placeat corporis odio eius perferendis qui expedita
                            odit
                            cumque aliquid reiciendis?</p>
                    </div>
                    <br>
                </div>
        </section>
        <br>
        <section id="coordonnees">
            <div class="coordonnees">
                <div id="map"></div>

                <h4>Coordonées</h4>
                <br>

                <div class="coordonees-txt">
                    <h5>Adresse</h5>
                    <p>Chemin des Épis Dorés, 02120 Marly-Gomont</p>
                    <br>
                    <h5>Téléphone</h5>
                    <p>06.00.00.00.00</p>
                    <br>
                </div>
            </div>
        </section>
        <br>
        <section id="avis">
            <div class="avis">
                <h4>Avis</h4>
                <h5>Ajouter votre avis</h5>
                <form>
                    <div class="lastname">
                        <label for="lastname">Nom ou pseudo</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="mail">
                        <label for="mail">Email</label>
                        <input type="text" name="mail" id="mail">
                    </div>
                    <div class="rating">
                        <label for="">Notes</label>
                        <div class="stars">
                            <i class="fa fa-star gold"></i>
                            <i class="fa fa-star gold"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                    </div>
                    <div class="tel">
                        <label for="tel">Téléphone</label>
                        <input type="text" name="tel" id="tel">
                    </div>
                    <div class="message">
                        <label class="message">Votre avis</label>
                        <textarea name="message"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Envoyer</button>
                </form>
            </div>
        </section>
    </main>

    <!--FOOTER-->
    <?php require_once(__DIR__ . '/footer.php'); ?>

    <script src="https://kit.fontawesome.com/4f2c3f58c1.js" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Sélectionnez le bouton et le modal
        var button = document.getElementById('buttonContact');
        var modal = document.getElementById('contactModal');

        // Lorsque l'utilisateur clique sur le bouton, affichez le modal
        button.onclick = function () {
            modal.style.display = 'block';
        }

        // Lorsque l'utilisateur clique sur × (fermer), fermez le modal
        modal.getElementsByClassName('close')[0].onclick = function () {
            modal.style.display = 'none';
        }

        // Lorsque l'utilisateur clique en dehors du modal, fermez-le également
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }

        var map = L.map('map').setView([49.9052, 3.7924], 13); // Marly, France

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

    </script>
</body>

</html>