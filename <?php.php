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
                    $requete = "SELECT * FROM Gîtes";
                    $resultat = $pdo->query($requete);

                    while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='mb-3'id='gitesCard'>
                            <div class='card-header'>Producteur</div>
                            <div class='card-body text-white' id='gite_card'>
                            <img src='img/rural-life-concept-with-farm-animals.jpg' style='float:left; margin-right: 2rem;'</img>
                            <h3 class='card-title' id='farm'>". $row['nom_gite'] . "</h3>
                            <h4 class='nameHost'>". $row['propriétaire'] . "</h4>
                            <p id='place'>". $row['localisation'] . "</p>
                            <p class='card-text'>". $row['descriptif'] . "</p>
                            <div class='d-flex justify-content-end'><a href='fiche_gite.php' class='text-success btn btn-light'>Lire plus</a></div>
                            </div> ";
                    };

                } catch (PDOException $e) {
                    // Handle database connection errors
                    echo "Connection échouée: " . $e->getMessage();
                };

                echo "Connexion à la base de données réussie";

                ?>