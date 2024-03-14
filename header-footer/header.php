<header>
<?php session_start();
require_once '../models/user.php';
?>
        <div>
            <div class="logo-titre">
                <a href="index.php" class="logo"><img src="img/logo_gites_locavores.png" class="container "
                        alt="logo_gites_locavores"></a>
                <h1 class="welcome">Bienvenue</h1>
            </div>

            <div class="menu">
                <nav class="navbar navbar-expand-md navbar-light ps-4 bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler fixed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="presentation.php">Présentation</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Nos Gites
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                                    <li><a class="dropdown-item" href="hauts-de-france.php">Hauts de France</a></li>
                                    <li><a class="dropdown-item" href="normandie.php">Normandie</a></li>
                                        <li><a class="dropdown-item" href="regions.php">Tous</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Nos idées
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="event.php">Évènements</a></li>
                                        <li><a class="dropdown-item" href="actus.php">Actualités</a></li>
                                        <li><a class="dropdown-item" href="recettes.php">Recettes</a></li>
                                        <li><a class="dropdown-item" href="produits-saison.php">Prdouits de saison</a>
                                        </li>
                                        <li><a class="dropdown-item" href="idees.php">Tous</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    $user_id = $_SESSION['user_id'];

                                    $user_type = Utilisateur::getUserTypeById($user_id);
                                    if ($user_type === 'hôte') {
                                        echo "<li class='nav-item'>
                                                <a class='nav-link' href='liste-gite-hote.php'>Mes Gîtes</a>
                                                </li>";
                                        echo "<li class='nav-item'>
                                                <a class='nav-link' href='liste-article-hote.php'>Mes Articles</a>
                                                </li>";

                                    }
                                }
                                ?>                                
                            </ul>
                        </div>

                    </div>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $user_type = Utilisateur::getUserTypeById($user_id);
                        if ($user_type === 'hôte') {
                            echo "<div><a href='ajout_article.php' class='add-gite btn'>Ajouter un Article</a></div>";
                            echo "<div><a href='ajout_gite.php' class='add-gite btn'>Ajouter un Gîte</a></div>";
                            echo "<div><a href='inscription.php' class='sign btn'>Déconnexion</a></div>";
                        } 
                    }else {
                            echo "<div><a href='regions.php' class='sign btn'>Réserver</a></div>";
                            echo "<div><a href='inscription.php' class='sign btn'>Inscription/Connexion</a></div>";                            
                        }
                    ?>

                </nav>

            </div>

        </div>
</header>   