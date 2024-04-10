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
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="../css/sign.css">
    <title>GL - Ajout de gîte</title>
</head>

<body>
<?php session_start();
require_once '../controllers/check-admin.php';
require_once '../models/user.php';
     if (isset($_SESSION['email'])) {
        $user_id = $_SESSION['user_id'];
        $user_type = Utilisateur::getUserTypeById($user_id);
        if ($user_type === 'hôte') {
            include '../header-footer/header-hote.php'; // Inclure le header pour l'hôte
        } elseif ($user_type === 'visiteur') {
            include '../header-footer/header-connect.php'; // Inclure le header pour le visiteur connecté
        }
    } else {
        include '../header-footer/header.php';
    }; ?>
<div class="row">
<div class="d-flex justify-content-around" id="connect">
    <div>
        <h3 class="mt-3">Ajouter un gîte</h3>
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div>
                    
                    <form action="../controllers/ajout_gite.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="farm name" name="nom_gite" required>                            
                            <label for="farm_name">Nom du gîte:</label>
                        </div>

                        <div class="form-floating">
                            <select name="region" id="user">
                                <option value="">Région</option>
                                <option value="Auvergne-Rhônes-Alpes">Auvergne-Rhônes-Alpes</option>
                                <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                                <option value="Bretagne">Bretagne</option>
                                <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                                <option value="Corse">Corse</option>
                                <option value="Grand Est">Grand Est</option>
                                <option value="Hauts-de-France">Hauts-de-France</option>
                                <option value="Ile-de-France">Ile-de-France</option>
                                <option value="Normandie">Normandie</option>
                                <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                                <option value="Occitanie">Occitanie</option>
                                <option value="Pays de la Loire">Pays de la Loire</option>
                                <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Réunion">Réunion</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="location" name="localisation" required>                                
                            <label for="location">Localisation:</label>
                        </div>
                                                
                        <div class="form-floating">
                            <input class="form-control" type="number" placeholder="capacite"  name="capacite" required>
                            <label for="host_name">Capacité:</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="description" name="descriptif" required></textarea>
                            <label for="description">Description:</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="price" name="tarifs" required>                                
                            <label for="price">Tarifs:</label>
                        </div>

                        <div class="form-floating">
                            <input class="add-file  form-control" type="file" multiple accept=".png, .jpg" name="image_path[]" >
                        </div>

                        <input type="submit" value="Ajouter">
                    </form>

                    </div>
                </div>
            </div>
        
    </div>
</div>
 

<?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>

   
</body>
</html>
