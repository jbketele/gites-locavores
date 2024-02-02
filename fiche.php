<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
require_once(__DIR__ . '/header.php');
// Vérifie si l'ID existe dans la requête GET
if (isset($_GET['gitesCard'])) {
    // Récupère l'ID depuis la requête GET
    $gitesCard_id = $_GET['gitesCard'];
    
    // Vous pouvez maintenant utiliser cet ID pour extraire les données correspondantes
    // Ici, nous allons simplement afficher la valeur de l'ID
    echo "ID de la carte : " . $gitesCard_id . "<br>";

    // Maintenant, vous pouvez extraire les autres informations à partir de l'ID et les afficher
    // Par exemple, pour afficher le titre de la carte, vous pouvez utiliser l'élément avec l'ID 'farm'
    echo "Titre de la carte : " . $_GET['farm'] . "<br>";
    // De même pour les autres éléments
    echo "Nom de l'hôte : " . $_GET['nameHost'] . "<br>";
    echo "Lieu : " . $_GET['place'] . "<br>";
    // Et ainsi de suite pour les autres informations que vous souhaitez afficher
} else {
    // Si l'ID n'est pas présent dans la requête GET
    echo "ID de la carte non trouvé dans la requête GET.";
}


require_once(__DIR__ . '/footer.php'); 
?>

</body>
</html>
<?php

?>
