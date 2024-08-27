<?php

require_once 'config/pdo.php';


$title = 'Connexion';

require_once 'templates/head.php';
require_once 'templates/header.php';
?>

<div class="container">
    <h1>Ajouter une voiture</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="username" name="username" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Connexion</button>
        </div>
    </form>
</div>



<?php require_once 'templates/footer.php'; ?>
