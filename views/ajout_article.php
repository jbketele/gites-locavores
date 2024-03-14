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
    <link rel="stylesheet" type="text/css" href="../sign.css">
    <title>GL - Ajout d'article</title>
</head>

<body>
<?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/header-hote.php'); ?>
<div class="row">
<div class="d-flex justify-content-around" id="connexion">
    <div>
        <h3 class="mt-3" style="padding: 0">Ajouter un article</h3>
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div>
                    
                    <form action="../controllers/article.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating">
                            <select name="categorie" id="user" onchange="toggleFields()">
                                <option value="">Catégorie</option>
                                <option value="evenements">Évènements</option>
                                <option value="actus">Actualités</option>
                                <option value="recettes">Recettes</option>
                                <option value="produits_saison">Produits de saison</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="farm name" name="nom_article" required>                            
                            <label for="article_name">Nom de l'article:</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control" type="text" placeholder="descriptif" name="descriptif" required>
                            <label for="descriptif">Descriptif:</label>
                        </div>

                        <div class="form-floating extra-fields evenements actus" style="display: none">
                            <input class="form-control" type="text" placeholder="lieu" name="lieu">                                
                            <label for="lieu">Lieu:</label>
                        </div>
                                                
                        <div class="form-floating extra-fields recettes" style="display: none">
                            <input class="form-control" type="number" placeholder="ingredients"  name="ingredients">
                            <label for="ingredients">Ingrédients:</label>
                        </div>

                        <div class="form-floating extra-fields recettes" style="display: none">
                            <textarea class="form-control" placeholder="nombre_personnes" name="nb_personnes"></textarea>
                            <label for="nb_personnes">Nombres de personnes:</label>
                        </div>

                        <div class="form-floating">
                            <input class="add-file  form-control" type="file" multiple accept=".png, .jpg" name="image_path[]" >
                        </div>

                        <input type="submit" name="ajouter_article" value="Ajouter">
                    </form>

                    </div>
                </div>
            </div>
        
    </div>
</div>
 

<?php require_once('/Applications/MAMP/htdocs/gites_locavores/header-footer/footer.php'); ?>

<script>
        // Fonction pour afficher ou cacher les champs supplémentaires en fonction de la catégorie sélectionnée
        function toggleFields() {
            var selectedCategory = document.getElementById("user").value;
            var extraFields = document.querySelectorAll(".extra-fields");

            // Parcourir tous les champs supplémentaires
            extraFields.forEach(function(field) {
                // Si la catégorie sélectionnée correspond à la classe du champ, l'afficher, sinon le cacher
                if (field.classList.contains(selectedCategory)) {
                    field.style.display = "block";
                } else {
                    field.style.display = "none";
                }
            });
        }
    </script>
</body>
</html>
