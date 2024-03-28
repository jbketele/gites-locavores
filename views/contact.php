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
    <title>GL - Contact</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="../sign.css">

</head>

<body>
<?php session_start();
require_once '/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'; ?>


    <main>
        <div class="row">
            <div class="d-flex justify-content-around" id="connect">

                    <div>
                        <h3 class="mt-3" style="padding: 0">Contact</h3>
                        <br>
                            <form class="contact" name="contact" method="POST">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="lastname" placeholder="Nom"></input>
                                    <label for="floatingInputGrid">Nom</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control" name="firstname" placeholder="Prénom"></input>
                                    <label for="floatingInputGrid">Prénom</label>
                                </div>

                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="Email"></input>
                                    <label for="floatingInputGrid">Email</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                    <label for="floatingInputGrid">Message</label>
                                </div>

                                <div class="form-floating">
                                    <input class="btn" type="submit" id="floatingInputGrid" value="Envoyer"></input>
                                </div>
                            </form>

                    </div>
                
            </div>
    </main>

    <?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>

</body>
</html>
