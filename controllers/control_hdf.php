<?php
require_once '../models/database.php';

require_once '../models/model_hdf.php';

// Instanciation du modèle
$model = new Model($db);

// Inclusion de la vue
require '../views/hdf.php';
?>
