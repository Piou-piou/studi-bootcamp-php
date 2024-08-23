<?php

require_once 'config/pdo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST['nom_hotel'] ||
        !$_POST['titre'] ||
        !$_POST['lieu'] ||
        !$_POST['min_duree'] ||
        !$_POST['max_duree'] ||
        !$_POST['remise'] ||
        !$_POST['prix'] ||
        !$_POST['description']
    ) {
        echo 'UN des champs du formulaire n\'est pas rempli';
    } else {
        $query = $pdo->prepare('INSERT INTO annonce
            (nom_hotel, titre, lieu, min_duree, max_duree, remise, prix, description)
            VALUES (
                :nom_hotel,
                :titre,
                :lieu,
                :min_duree,
                :max_duree,
                :remise,
                :prix,
                :description
            )
        ');

        $query->bindParam('nom_hotel', $_POST['nom_hotel']);
        $query->bindParam('titre', $_POST['titre']);
        $query->bindParam('lieu', $_POST['lieu']);
        $query->bindParam('min_duree', $_POST['min_duree']);
        $query->bindParam('max_duree', $_POST['max_duree']);
        $query->bindParam('remise', $_POST['remise']);
        $query->bindParam('prix', $_POST['prix']);
        $query->bindParam('description', $_POST['description']);

        $query->execute();

        $_SESSION['message'] = 'annonce ajoutée avec succes';

        header('Location: index.php');
    }
} else {
    echo 'Page innaccessible via un GET';
}
