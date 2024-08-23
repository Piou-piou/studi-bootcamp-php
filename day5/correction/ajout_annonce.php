<?php

require_once 'config/pdo.php';

$title = 'Ajouter une annonce';

require_once 'templates/head.php';
require_once 'templates/header.php';

?>

<main class="container">
    <h1>Ajouter une annonce</h1>

    <form action="form_validation_annonce.php" method="post">
        <div class="mb-3">
            <label for="nom_hotel" class="form-label">Nom de l'hôtel</label>
            <input type="text" class="form-control" name="nom_hotel" id="nom_hotel" required>
        </div>

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre"  required>
        </div>

        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" class="form-control" name="lieu" id="lieu">
        </div>

        <div class="mb-3">
            <label for="min_duree" class="form-label">Durée minimale (en jours)</label>
            <input type="number" class="form-control" name="min_duree" id="min_duree">
        </div>

        <div class="mb-3">
            <label for="max_duree" class="form-label">Durée maximale (en jours)</label>
            <input type="number" class="form-control" name="max_duree" id="max_duree">
        </div>

        <div class="mb-3">
            <label for="remise" class="form-label">Remise en %</label>
            <input type="number" class="form-control" name="remise" id="remise">
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix en €</label>
            <input type="number" class="form-control" name="prix" id="prix">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description"  class="form-control" cols="30" rows="10"></textarea>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Valider</button>
        </div>
    </form>
</main>
