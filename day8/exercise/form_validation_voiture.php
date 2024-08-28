<?php

require_once 'config/config.php';

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
/*        if (!is_int($_POST['annee']) || !is_int($_POST['km'])) {
            echo 'Annee ou km pas un entier';
            die;
        }*/

        $query = DbConnection::getPdo()->prepare('INSERT INTO voiture
            (immatriculation, marque, annee, modele, km, type_motorisation, etat, user_id)
            VALUES (
                :immatriculation,
                :marque,
                :annee,
                :modele,
                :km,
                :type_motorisation,
                :etat,
                :user_id
            )
        ');


        $query->bindValue('immatriculation', DbConnection::protectDbData($_POST['immatriculation']));
        $query->bindValue('marque', DbConnection::protectDbData($_POST['marque']));
        $query->bindParam('annee', $_POST['annee'], PDO::PARAM_INT);
        $query->bindParam('modele', $_POST['modele']);
        $query->bindParam('km', $_POST['km'], PDO::PARAM_INT);
        $query->bindParam('type_motorisation', $_POST['type_motorisation']);
        $query->bindParam('etat', $_POST['etat']);
        $query->bindParam('user_id', $_SESSION['user']['id'], PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
} else {
    echo 'Impossible d\'arriver sur cette page en GET';
}
