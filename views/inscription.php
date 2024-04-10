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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/sign.css">

</head>

<body>
    <!--NAVBAR-->
    <?php include('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>

    <main>
        <div>
            <div id="connexion">
                <div>
                    <h3 class="mt-3 p-0">Inscription</h3>
                    <form action="../controllers/user.php" method="POST" onsubmit="return validateForm()">
                        <div class="mt-3">
                            <div class="row justify-content-center">
                                <div>
                                    <label class="type-compte" for="user">Type de compte</label>
                                    <div class="form-floating">
                                        <select name="type" id="user" required>
                                            <option value="visiteur">Visiteur</option>
                                            <option value="hôte">Hôte</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Nom" id="lastname" name="lastname" required>
                                        <label for="lastname">Nom<span class="required">*</span></label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname" required>
                                        <label for="firstname">Prénom<span class="required">*</span></label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="mail" placeholder="name@example.com" name="email" required>
                                        <label for="mail">Email<span class="required">*</span></label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="password" required>
                                        <label for="mdp">Mot de passe<span class="required">*</span></label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="tel" placeholder="Téléphone" name="tel">
                                        <label for="tel">Téléphone<span class="required">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-success btn-lg mb-5" type="submit" name="envoi" value="Valider">
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
                                        <input type="submit" class="btn btn-success" id="floatingInputGrid" value="Se connecter">
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

    <script>
function validateForm() {
    var tel = document.getElementById('tel').value;

    var regex = /^[0-9]{10}$/;

    if (!regex.test(tel)) {
        alert('Veuillez saisir un numéro de téléphone valide (10 chiffres).');
        return false; 
    } else {
    return true;
    }
}
</script>


</body>

</html>