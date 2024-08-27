<?php


$title = 'Ajouter une voiture';

require_once 'templates/head.php';
require_once 'templates/header.php';
?>

<div class="container">
    <h1>Ajouter une voiture</h1>

    <form action="form_validation_voiture.php" method="post">
        <div class="mb-3">
            <label for="immatriculation" class="form-label">Immatriculation</label>
            <input type="text" class="form-control" id="immatriculation" name="immatriculation" placeholder="AA-000-AA">
        </div>
        <div class="mb-3">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" class="form-control" id="marque" name="marque">
        </div>
        <div class="mb-3">
            <label for="annee" class="form-label">Année</label>
            <input type="number" class="form-control" id="annee" name="annee">
        </div>
        <div class="mb-3">
            <label for="modele" class="form-label">Modèle</label>
            <input type="text" class="form-control" id="modele" name="modele">
        </div>
        <div class="mb-3">
            <label for="km" class="form-label">Km</label>
            <input type="number" class="form-control" id="km" name="km">
        </div>
        <div class="mb-3">
            <label for="type_motorisation" class="form-label">Type de motorisation</label>
            <select name="type_motorisation" id="type_motorisation"  class="form-select" aria-label="Select de la motorisation">
                <option value="Essence">Essence</option>
                <option value="Diesel">Diesel</option>
                <option value="Electrique">Electrique</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Etat" class="form-label">Etat</label>
            <select name="etat" id="etat"  class="form-select" aria-label="Select de l'état">
                <option value=""></option>
                <option value="Mauvais">Mauvais</option>
                <option value="Correct">Correct</option>
                <option value="Moyen">Moyen</option>
                <option value="Bon">Bon</option>
                <option value="Incroyable">Incroyable</option>
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
</div>



<?php require_once 'templates/footer.php'; ?>
