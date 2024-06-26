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
<?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>


    <main>
        <section>
            <div class="row row-cols-1 row-cols-md-2 g-2" id="ideas">
                <div class="col d-flex">
                    <div class="card" id="idea">
                        <a class="d-flex justify-content-center" href="event.php"><img src="img/calendar_591567.png"
                                style="width: 20%" class="card-img-top" alt="..."></a>
                        <div class="mt-3">
                            <h5 class="text-center">Évènements</h5>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card" id="idea">
                        <a class="d-flex justify-content-center" href="actus.php"><img src="img/newspaper_2965879.png"
                                style="width: 20%;" class="card-img-top" alt="..."></a>
                        <div class="mt-3">
                            <h5 class="text-center">Actualités</h5>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card" id="idea">
                        <a class="d-flex justify-content-center" href="recettes.php"><img
                                src="img/cook-book_13310212.png" style="width: 20%;" class="card-img-top" alt="..."></a>
                        <div class="mt-3">
                            <h5 class="text-center">Recettes</h5>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card" id="idea">
                        <a class="d-flex justify-content-center" href="produits-saison.php"><img
                                src="img/vegetables_3967324.png" class="card-img-top" style="width: 20%;" alt="..."></a>
                        <div class="mt-3">
                            <h5 class="text-center">Produits de saison</h5>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>

</body>

</html>