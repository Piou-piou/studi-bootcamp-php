<?php

// Exo 1
// pour chacune des voitures afficher le kilométrage, type motorisation, etat
$voitures = [
    'AA-000-AA' => [
        'marque' => 'peugeot',
        'annee' => 2011,
        'modele' => 208,
        'km' => 150000,
        'type_motorisation' => 'essence',
        'etat' => 'médiocre',
    ],

    'AB-000-AB' => [
        'marque' => 'peugeot',
        'annee' => 2015,
        'modele' => 3008,
        'km' => 124000,
        'type_motorisation' => 'diesel',
        'etat' => 'bon',
    ],

    'AC-000-AC' => [
        'marque' => 'citroen',
        'annee' => 2020,
        'modele' => 'C4',
        'km' => 12000,
        'type_motorisation' => 'electrique',
        'etat' => 'très bien',
    ],

    'AD-000-AD' => [
        'marque' => 'citroen',
        'annee' => 2011,
        'modele' => 'DS3',
        'km' => 52000,
        'type_motorisation' => 'essence',
        'etat' => 'bon',
    ],
];

foreach ($voitures as $imatriculation => $voiture) {
    echo 'Voiture : ' . $imatriculation . '<br>';
    echo 'Marque : ' . $voiture['marque'] . '<br>';
    echo 'Année : ' . $voiture['annee'] . '<br>';
    echo 'Modèle : ' . $voiture['modele'] . '<br>';
    echo 'Km : ' . $voiture['km'] . '<br>';
    echo 'Moteur : ' . $voiture['type_motorisation'] . '<br>';
    echo 'Etat : ' . $voiture['etat'] . '<br>';
    echo '<br>';
}

// pour les notes suivantes afficher
// si la note est entre 10 et 15 peut mieux faire
// si la note est entre 8 et 10 afficher pas ouf
// si en dessous de 8 afficher bon redoublement !
$notes = [10, 13, 10.5, 9, 7];

foreach ($notes as $note) {
    if ($note >= 10 && $note < 15) {
        echo 'Peut mieux faire<br>';
    } elseif ($note >= 8 && $note < 10) {
        echo 'Pas ouf<br>';
    } elseif ($note < 8) {
        echo 'Bon redoublement !<br>';
    }
}


// Exo 2
// je possède un magasin d'ahbits
// je souhaite afficher la liste de mes employés avec leurs age, sexe, nom, prenom ainsi que type de contrat et date de début et fin de contrat si CDD
$list_emp = [
    'employe_1' => [
        'nom' => 'Dupont',
        'prenom' => 'Tintin',
        'age' => 20,
        'sexe' => 'masculin',
        'contrat' => 'cdi',
        'deb_contrat' => '10/02/2000',
        'fin_contrat' => '',
    ]
];

foreach ($list_emp as $key => $employe) {
    echo 'Nom : ' . $employe['nom'] . '<br>';
    echo 'Prenom : ' . $employe['prenom'] . '<br>';
    echo 'Age : ' . $employe['age'] . '<br>';
    echo 'Sexe : ' . $employe['sexe'] . '<br>';
    echo 'Type de contrat : ' . $employe['contrat'] . '<br>';
    echo 'Début de contrat : ' . $employe['deb_contrat'] . '<br>';
    echo 'Fin de contrat : ' . $employe['fin_contrat'] . '<br>';
}

$employes = [
    'DJ' => [
        'age' => 30,
        'sexe' => 'M',
        'nom' => 'Doe',
        'prenom' => 'John',
        'contratType' => 'CDI',
        'dateDebutContrat' => '2018-01-01',
        'dateFinContrat' => null,
        'salaire' => 1500,
    ],

    'SJ' => [
        'age' => 25,
        'sexe' => 'F',
        'nom' => 'Smith',
        'prenom' => 'Jane',
        'contratType' => 'CDD',
        'dateDebutContrat' => '2020-01-01',
        'dateFinContrat' => '2020-12-31',
        'salaire' => 2000,
    ],

    'JJ' => [
        'age' => 40,
        'sexe' => 'M',
        'nom' => 'Johnson',
        'prenom' => 'John',
        'contratType' => 'CDI',
        'dateDebutContrat' => '2019-01-01',
        'dateFinContrat' => null,
        'salaire' => 800,

    ],
];

foreach ($employes as $key => $employe) {
    echo 'id: ' . $key . '<br>';
    echo 'age: ' . $employe['age'] . '<br>';
    echo 'sexe: ' . $employe['sexe'] . '<br>';
    echo 'nom: ' . $employe['nom'] . '<br>';
    echo 'prenom: ' . $employe['prenom'] . '<br>';
    echo 'contrat type: ' . $employe['contratType'] . '<br>';
    echo 'salaire:' . $employe['salaire'] . '<br>';
    echo 'date de début contrat: ' . $employe['dateDebutContrat'] . '<br>';

    if ($employe['contratType'] == 'CDD') {
        echo 'date de fin de contrat: ' . $employe['dateFinContrat'] . '<br>';
    } else {
        '<br>';
    }

    if ($employe['salaire'] <= 1900) {
        echo 'votre remunération est faible' . '<br>';
    } else {
        echo 'vous avez une bonne rémunération' . '<br>';
    }

    echo '<br>';
}


// Exo 3
// je possède un agence immobilière
// je souhaite afficher la liste de mes offres de maison à vendre avec leurs taille, nombre étage, localisation et année de construction
$realEstates = [
    'house1' => [
        'surface' => 'Studio',
        'floors' => 'RDC',
        'location' => 'Paris',
        'construction' => 1987,
    ],
    'house2' => [
        'surface' => 'F1',
        'floors' => '2',
        'location' => 'Paris',
        'construction' => 1979,
    ],
    'house3' => [
        'surface' => 'F2',
        'floors' => '3',
        'location' => 'Paris',
        'construction' => 1985,
    ],
    'house4' => [
        'surface' => 'F3',
        'floors' => 'RDC',
        'location' => 'Paris',
        'construction' => 1972,
    ],
    'house5' =>[
        'surface' => 'Studio',
        'floors' => '1',
        'location' => 'Paris',
    ],
];

foreach ($realEstates as $index => $house) {
    echo "L'agence vous propose la maison : {$index} \n";
    echo $house['surface']."\n";
    echo $house['floors']."\n";
    echo $house['location']."\n";

    if (array_key_exists('construction', $house)) {
        echo $house['construction']."\n";
    }

    echo "\n";
}



$maisons = [
    uniqid() => [
        'nom' => 'Villa Carpe Diem',
        'taille' => 300,
        'etages' => 3,
        'localisation' => 'Cannes',
        'construction' => 2022,
    ],
    uniqid() => [
        'nom' => 'Villa Isla Bonita',
        'taille' => 100,
        'etages' => 1,
        'localisation' => 'Grasse',
        'construction' => 2015,
    ],
    5 => [
        'id' => 5,
        'nom' => 'Villa Isabelle',
        'taille' => 200,
        'etages' => 0,
        'localisation' => 'Antibes',
        'construction' => 2008,
    ]
];

foreach ($maisons as $cleMaison => $maison){
    echo 'Clé villa : '.$cleMaison.'<br>';
    echo 'Nom de la villa : '.$maison['nom'].'<br>';
    echo 'Taille : '.$maison['taille'].' m²'.'<br>';
    echo 'Nombre d\'étages : '.$maison['etages'].'<br>';
    echo 'Localisation : '.$maison['localisation'].'<br>';
    echo 'Année de construction : '.$maison['construction'].'<br>';
    echo '<br>';
}
