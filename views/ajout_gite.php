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
    <link rel="stylesheet" type="text/css" href="../styles.css">
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
<?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header.php'); ?>
<div class="row">
<div class="d-flex justify-content-around" id="connexion">
    <div>
        <h3 class="mt-3" style="padding: 0">Ajouter un gîte</h3>
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div>
                    <?php

                    // Database configuration
                    $host = 'localhost';
                    $dbName = 'gites';
                    $username = 'jbketele';
                    $password = 'pasdavenirsansagri';

                    try {
                        // Create a new PDO instance
                        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

                        // Set PDO error mode to exception
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Your code here...
                        // Vérifier si le formulaire a été soumis
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Récupérer les valeurs du formulaire
                            $farm_name = $_POST["farm_name"];
                            $host_name = $_POST["host_name"];
                            $location = $_POST["location"];
                            $description = $_POST["description"];

                            // Requête d'insertion avec une requête préparée
                            $sql = "INSERT INTO gîtes (nom_gite, propriétaire, region, localisation, capacite, descriptif) 
                            VALUES (:farm_name, :host_name, :place, :region, :capacite, :descriptif)";
                            $stmt = $pdo->prepare($sql);

                            // Lier les valeurs et exécuter la requête
                            $stmt->bindParam(':farm_name', $farm_name);
                            $stmt->bindParam(':host_name', $host_name);
                            $stmt->bindParam(':place', $location);
                            $stmt->bindParam(':region', $region);
                            $stmt->bindParam(':capacite', $capacite);
                            $stmt->bindParam(':nombre_chambres', $nombre_chambres);
                            $stmt->bindParam(':descriptif', $description);
                            $stmt->execute();
                            echo "Données insérées avec succès.";
                        }                        


                    } catch (PDOException $e) {
                        // Handle database connection errors
                        echo "Connection échouée: " . $e->getMessage();
                    }


                    ?>
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
                            <textarea class="form-control" placeholder="region" name="region" required></textarea>
                            <label for="description">Région:</label>
                            </div>

                            <div class="form-floating">
                            <input class="form-control" type="text" placeholder="location" name="location" required>                                
                            <label for="location">Localisation:</label>
                            </div>
                            
                            <div class="form-floating">
                            <input class="form-control" type="text" placeholder="capacite"  name="capacite" required>
                            <label for="host_name">Capacité:</label>
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
 

<?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>

   
</body>
</html>
