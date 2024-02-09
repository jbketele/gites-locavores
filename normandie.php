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
    <title>Gites Locavores - Normandie</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        #map {
            height: 50%;
            width: 75%;
            margin-top: 3rem;
            margin-left: 5rem;
        }
        section{
            display: grid;
            grid-template-columns : 3fr 2fr;
            column-gap: 1rem;
        }
    </style>
</head>

<body>
<?php require_once('header-footer/header.php'); ?>


    <main>
        <section>
            <div class="list-gites">

            <div class="container">
                    <form method="post">
                         <input type="text" id="filterInput" placeholder="Mots-clés">
                    </form>    
                </div>

                <div class="container col-md-10 cards">
                    <div class="card mb-3" id="gitesCard">
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

                    <div class="card mb-3" id="gitesCard">
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

                    <div class="card mb-3" id="gitesCard">
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
            <div id="map"></div>
        </section>
    </main>

    <?php require_once('header-footer/footer.php'); ?>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.getElementById('filterInput').addEventListener('input', function () {
    filterCards();
});
function filterCards() {
    var inputText = document.getElementById('filterInput').value.toLowerCase();
    var cards = document.getElementsByClassName('card');
    for (var i = 0; i < cards.length; i++) {
        var cardText = cards[i].textContent.toLowerCase();
        var card = cards[i];

        if (cardText.includes(inputText)) {
            card.classList.remove('hidden')
            card.style.order = 0

        } else {
            card.classList.add('hidden')
            card.style.order = 1
        }
    }
}

        var map = L.map('map').setView([48.879870, 0.171253], 8); // Amiens, France

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker1 =  L.marker([49.6179384, 0.7538866]).addTo(map);
        marker1.bindPopup("<b>La Ferme de M. Seguin</b><br>Éric Dupont");


       var marker2 = L.marker([49.0598651, -1.0250661]).addTo(map);
       marker2.bindPopup("<b>GAEC des Marais</b><br>D. Le Garrec");
      var marker3 =  L.marker([49.3455531, 0.3427251]).addTo(map);
      marker3.bindPopup("<b>SCEA de la Sablière</b><br>Jean Leclerc");

    </script>
</body>

</html>