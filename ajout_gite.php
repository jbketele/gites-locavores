<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo gites detoure.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>GL - Ajout de gîte</title>
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
<?php require_once(__DIR__ . '/header.php'); ?>
<div class="row">
<div class="d-flex justify-content-around" id="connexion">
    <div>
        <h3 class="mt-3" style="padding: 0">Ajouter un gîte</h3>
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div>
                        <form method="POST">
                            <div class="form-floating">
                                <input class="form-control" type="text" placeholder="farm name" name="farm_name" required>                            
                                <label for="farm_name">Nom de la ferme:</label>
                            </div>
                            
                            <div class="form-floating">
                            <input class="form-control" type="text" placeholder="host name"  name="host_name" required>
                            <label for="host_name">Nom de l'hôte:</label>
                            </div>

                            <div class="form-floating">
                            <input class="form-control" type="text" placeholder="location" name="location" required>                                
                            <label for="location">Emplacement:</label>
                            </div>

                            <div class="form-floating">
                            <textarea class="form-control" placeholder="description" name="description" required></textarea>
                            <label for="description">Description:</label>
                            </div>

                            <input type="submit" value="Ajouter">
                        </form>
                    </div>
                </div>
            </div>
        
    </div>
</div>
 <?php
       if (isset($_POST['host_name'])) {
        $mysqli = new mysqli("localhost", "root", "", "liste-gites");
        $mysqli->set_charset("utf8");
        $requete = "INSERT INTO carnet VALUES(NULL, '" . $_POST['farm_name'] . "', '" . $_POST['host_name'] . "', '" . $_POST['location'] . "', '" . $_POST['description'] . "')";
        $resultat = $mysqli->query($requete);
        if ($resultat)
            echo "<p>Le gîte a été ajouté</p>";
        else
            echo "<p>Erreur</p>";
    }
    ?>

    <?php require_once(__DIR__ . '/footer.php'); ?>

   
</body>
</html>
