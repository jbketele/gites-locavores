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
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php require_once(__DIR__ . '/header.php'); ?>


    <main>
        <div class="row">
            <div class="container" id="contact">
                <div>

                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 d-flex justify-content-center">
                                <form class="contact" name="contact" method="POST" netlify>
                                    <p>
                                        <label>Nom : <input type="text" name="lastname" /></label>
                                    </p>
                                    <p>
                                        <label>Prénom : <input type="text" name="firstname" /></label>
                                    </p>
                                    <p>
                                        <label>Email : <input type="email" name="email" /></label>
                                    </p>

                                    <p>
                                        <label>Message : <textarea name="message"></textarea></label>
                                    </p>
                                    <p class="envoyer">
                                        <button type="submit">Envoyer</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>
