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
    <title>Gites Locavores - Connexion</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    h3{
        padding: 0;
        text-align: center;
        backdrop-filter: brightness(0.5);
        color: white;
    }
</style>
<body>
    <!--NAVBAR-->
    <?php require_once(__DIR__ . '/header.php'); ?>

    <main>
        <div class="row">
            <div class="d-flex justify-content-around" id="connexion">
              
                <div>
                    <h3 class="mt-3" style="padding: 0">Connexion</h3>
                    <form>
                        <div class="connect">
                            <div class="row justify-content-center">
                                <div>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="identifiant"
                                            id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Identifiant</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="floatingInputGrid"
                                            placeholder="mdp">
                                        <label for="floatingInputGrid">Mot de passe</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="container-fluid d-flex justify-content-center">
                        <a class="btn btn-primary btn-lg mt-5 mb-5" href="#" target="_blank">Valider</a>
                    </div>
                </div>
            </div>
    </main>


    <!--FOOTER-->
    <?php require_once(__DIR__ . '/footer.php'); ?>


</body>

</html>