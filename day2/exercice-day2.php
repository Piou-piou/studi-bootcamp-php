<?php

// Exo 1
// pour chacune des voitures afficher le kilométrage, type motorisation, etat
$voitures = [
  'AA-000-AA' => [
      'marque' => 'peugeot',
      'annee' => 2011,
      'modele' => 208,
  ],

  'AB-000-AB' => [
      'marque' => 'peugeot',
      'annee' => 2015,
      'modele' => 3008,
  ],

  'AC-000-AC' => [
      'marque' => 'citroen',
      'annee' => 2020,
      'modele' => 'C4',
  ],

  'AD-000-AD' => [
      'marque' => 'citroen',
      'annee' => 2011,
      'modele' => 'DS3',
  ],
];

echo $voitures['AA-000-AA']['marque'];
echo $voitures['AA-000-AA']['annee'];

foreach ($voitures as $imatriculation => $voiture) {
    echo 'Voiture : '.$imatriculation.'<br>';
    echo $voiture['marque'].'<br>';
    echo $voiture['annee'].'<br>';
    echo $voiture['modele'].'<br>';
    echo '<br>';
}

// pour les notes suivantes afficher
// si la note est entre 10 et 15 peut mieux faire
// si la note est entre 8 et 10 afficher pas ouf
// si en dessous de 8 afficher bon redoublement !
$notes = [10, 15, 10.5, 50, 10];



// Exo 2
// je possède un magasin d'ahbits
// je souhaite afficher la liste de mes employés avec leurs age, sexe, nom, prenom ainsi que type de contrat et date de début et fin de contrat si CDD



// Exo 3
// je possède un agence immobilière
// je souhaite afficher la liste de mes offres de maison à vendre avec leurs taille, nombre étage, localisation et année de construction

