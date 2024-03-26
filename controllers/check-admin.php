<?php require_once '../models/user.php' ?>

<?php
if(isset($_SESSION['user_id'])) {
    $user = new Utilisateur();
    $user->setId($_SESSION['user_id']);
    if($user->checkHote() == false) {
        echo '<script>window.location.href = "index.php";</script>';
        exit();
    }
    $_SESSION['isAdmin'] = $user->checkHote();
}

if(!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href = "index.php";</script>';
    exit();
}
?>