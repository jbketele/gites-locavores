<header>
<?php
require_once '../models/user.php';
?>
        <div>
            <div class="menu p-0">
             
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <div class="container-fluid">
                <a href="index.php"  class="logo logo-header"><img src="img/logo-gl-detoure.png" class="container "
                        alt="logo_gites_locavores"></a>                           
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
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" role="button" 
                                        data-bs-toggle="dropdown" aria-expanded="false" href="">Présentation</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="presentation.php">Qui sommes-nous ?</a></li>
                                        <li><a class="dropdown-item" href="valeurs.php">Nos valeurs</a></li>
                                        </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Nos gîtes
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="regions.php">Tous</a></li>
                                    <li><a class="dropdown-item" href="auvergne.php">Auvergne-Rhônes-Alpes</a></li>
                                    <li><a class="dropdown-item" href="bourgogne.php">Bourgogne-Franche-Comté</a></li>
                                    <li><a class="dropdown-item" href="bretagne.php">Bretagne</a></li>
                                    <li><a class="dropdown-item" href="centre.php">Centre-Val de Loire</a></li>
                                    <li><a class="dropdown-item" href="corse.php">Corse</a></li>
                                    <li><a class="dropdown-item" href="grand-est.php">Grand Est</a></li>
                                    <li><a class="dropdown-item" href="hauts-de-france.php">Hauts de France</a></li>
                                    <li><a class="dropdown-item" href="ile-de-france.php">Ile de France</a></li>
                                    <li><a class="dropdown-item" href="normandie.php">Normandie</a></li>
                                    <li><a class="dropdown-item" href="aquitaine.php">Nouvelle-Aquitaine</a></li>
                                    <li><a class="dropdown-item" href="occitanie.php">Occitanie</a></li>
                                    <li><a class="dropdown-item" href="pays-loire.php">Pays de la Loire</a></li>
                                    <li><a class="dropdown-item" href="paca.php">PACA</a></li>
                                    <li><a class="dropdown-item" href="guadeloupe.php">Guadeloupe</a></li>
                                    <li><a class="dropdown-item" href="martinique.php">Martinique</a></li>
                                    <li><a class="dropdown-item" href="reunion.php">Réunion</a></li>
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

                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    $user_id = $_SESSION['user_id'];

                                    $user_type = Utilisateur::getUserTypeById($user_id);
                                    if ($user_type === 'hôte') {
                                        echo "<li class='nav-item'>
                                                <a class='nav-link' href='liste-gite-hote.php'>Mes gîtes</a>
                                                </li>";
                                        echo "<li class='nav-item'>
                                                <a class='nav-link' href='liste-articles-hote.php'>Mes articles</a>
                                                </li>";
                                        echo "<li class='nav-item'>
                                                <a class='nav-link' href='votre-compte.php'>Mon compte</a>
                                                </li>";
                                    } elseif ($user_type = 'visiteur') {
                                        echo "<li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='' id='navbarDropdown' role='button' 
                                        data-bs-toggle='dropdown' aria-expanded='false'>Mon compte</a>
                                        <ul class='dropdown-menu' araia-labelledby='navbarDropdown'>
                                        <li><a class='dropdown-item' href='liste-reservations.php'>Mes réseravtions</a></li>
                                        <li><a class='dropdown-item' href='votre-compte.php'>Mes infos</a></li>
                                        </ul>";
                                    }
                                }
                                ?>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                
                            </ul>
                        </div>

                    </div>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $user_type = Utilisateur::getUserTypeById($user_id);
                        if ($user_type === 'hôte') {
                            echo "<div><a href='ajout_gite.php' class='add-gite btn'>Ajouter un gîte</a></div>";
                            echo "<div><a href='ajout_article.php' class='add-gite btn'>Ajouter un article</a></div>";
                            echo "<form action='../controllers/logout.php' method='POST'>
                            <button type='submit' class='sign btn'>Déconnexion</button>";
                        } elseif ($user_type = 'visiteur') {
                            echo "<div><a href='regions.php' class='sign btn'>Réserver</a></div>";
                            echo "<form action='../controllers/logout.php' method='POST'>
                            <button type='submit' class='sign btn'>Déconnexion</button>";
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