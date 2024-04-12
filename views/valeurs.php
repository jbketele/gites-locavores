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
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>
    <!--NAVBAR-->
    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>


    <main>
    <div class="container text-center">
        <h2 class="p-0">Nos valeurs</h2>
        <h4 class="fst-italic">Les 3 "Dé"</h4>
        <br>
        <div class="d-flex justify-content-around">
            <img class="valeurs" src="img/5468033-nature-piscine-ete-vacances-loisirs-detente-plat-design-illustration-vectoriel.jpg" alt="">
            <img class="valeurs" src="img/2072951-nature-printemps-paysage-vectoriel.jpg" alt="">
            <img class="valeurs" src="img/6133989-produits-d-automne-locaux-au-marche-des-agriculteurs-fruits-legumes-biologiques-au-comptoir-etalage-en-bois-marche-avec-balances-illustrationle-plate-vectoriel.jpg" alt="">
        </div>
        <br>
        <div class="d-flex justify-content-around bg-white">
            <div>
                <h3 class="p-0">Détente</h3>
                <p class="px-3">Nous nous engageons à créer un environnement propice à la relaxation totale. 
                    Chaque aspect de notre service, des aménagements de nos gîtes à notre approche du service client, 
                    est conçu pour offrir à nos clients une expérience de détente inoubliable.</p>
            </div>
            <div>
                <h3 class="p-0">Découverte</h3>
                <p class="px-3">Nous croyons au pouvoir de la découverte pour enrichir nos vies. À travers des activités 
                    organisées, des recommandations de visites locales et des rencontres avec des habitants, nous encourageons 
                    nos clients à explorer et à découvrir les merveilles de la région où ils séjournent.</p>
            </div>
            <div>
                <h3 class="p-0">Dégustations</h3>
                <p class="px-3">Nous sommes passionnés par la gastronomie locale et nous croyons en son pouvoir de 
                    rassembler les gens autour d'une table. Nous offrons à nos clients des expériences culinaires authentiques, 
                    mettant en valeur les produits locaux et les recettes traditionnelles.</p>
            </div>
        </div>


    </div>

    </main>

    <!--FOOTER-->
    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>


</body>

</html>