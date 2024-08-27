<?php

require_once 'config/DbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    if (!$_POST['immatriculation'] ||
        !$_POST['marque'] ||
        !$_POST['annee'] ||
        !$_POST['modele'] ||
        !$_POST['km'] ||
        !$_POST['type_motorisation'] ||
        !$_POST['etat']
    ) {
        echo 'UN des champs est vide. Insertion impossible !';
    } else  {
        $query = DbConnection::getPdo()->prepare('INSERT INTO voiture
            (immatriculation, marque, annee, modele, km, type_motorisation, etat)
            VALUES (
                :immatriculation,
                :marque,
                :annee,
                :modele,
                :km,
                :type_motorisation,
                :etat
            )
        ');



        $query->bindParam('immatriculation', $_POST['immatriculation']);
        $query->bindParam('marque', $_POST['marque']);
        $query->bindParam('annee', $_POST['annee']);
        $query->bindParam('modele', $_POST['modele']);
        $query->bindParam('km', $_POST['km']);
        $query->bindParam('type_motorisation', $_POST['type_motorisation']);
        $query->bindParam('etat', $_POST['etat']);

        $query->execute();

        header('Location: index.php');
    }
} else {
    echo 'Impossible d\'arriver sur cette page en GET';
}
