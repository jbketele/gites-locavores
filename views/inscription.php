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
    <title>Gites Locavores - Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../sign.css">

</head>

<body>
    <!--NAVBAR-->
    <?php include('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>

    <main>
        <div>
            <div id="connexion">
                <div>
                    <h3 class="mt-3 p-0">Inscription</h3>
                    <form action="../controllers/user.php" method="POST">
                        <div class="mt-5">
                            <div class="row justify-content-center">
                                <div>
                                    <div class="form-floating">
                                        <select name="type" id="user">
                                            <option value="">Type de compte</option>
                                            <option value="visiteur">Visiteur</option>
                                            <option value="hôte">Hôte</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Nom" id="lastname" name="lastname">
                                        <label for="lastname">Nom</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname">
                                        <label for="firstname">Prénom</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="mail" placeholder="name@example.com" name="email">
                                        <label for="mail">Email</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="password">
                                        <label for="mdp">Mot de passe</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mail"  name="tel">
                                        <label for="mail">Téléphone</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg mt-5 mb-5" type="submit" name="envoi">Valider</button>
                        </div>
                    </form>

                   
                </div>
                <div>
                    <h3 class="mt-3 p-0">Connexion</h3>
                    <form action="../controllers/user.php" method="POST">
                        <div class="connect">
                            <div class="row justify-content-center">
                                <div>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" placeholder="Email"
                                            id="floatingInputGrid" name="email"></input>
                                        <label for="floatingInputGrid">Email</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingInputGrid"
                                            placeholder="mdp" name="password">
                                        <label for="floatingInputGrid">Mot de passe</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="submit" class="btn" id="floatingInputGrid" value="Se connecter">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </main>


    <!--FOOTER-->
    <?php include('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>


</body>

</html>