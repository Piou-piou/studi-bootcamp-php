<?php

require_once 'Personnage.php';
require_once 'Equipement.php';







$merlin = new Personnage('Merlin', 100, 5); //Personnage Merlin
$arthur = new Personnage('Arthur', 120, 50); //Personnage Arthur

echo '<h2>Personnage Merlin</h2>';
echo $merlin->getNom().'<br>';
echo $merlin->getSante().'<br>';


echo '<h2>Personnage Arthur</h2>';
echo $arthur->getNom().'<br>';
echo $arthur->getSante().'<br>';


echo '<h2>merlin recoit une attaque d\'arthur lui faisant 30pv</h2>';
$arthur->attaque($merlin);
echo $merlin->getNom().'<br>';
echo $merlin->getSante().'<br>';


echo '<h2>merlin replique</h2>';
$merlin->attaque($arthur);
echo $arthur->getNom().'<br>';
echo $arthur->getSante().'<br>';

echo '<h2>merlin se soigne</h2>';
$merlin->appliqueSoins();
echo $merlin->getNom().'<br>';
echo $merlin->getSante().'<br>';


echo '<h2>arthur se soigne</h2>';
$arthur->appliqueSoins();
echo $arthur->getNom().'<br>';
echo $arthur->getSante().'<br>';


echo '<br>--------<br>';
echo '<br>--------<br>';
echo '<br>--------<br>';


/**
 * Exercice 1 : faire en sorte q'un personnage puisse se défendre de la part d'un autre
 * un personnage se défend d'un attaque reçue
 */
echo '<h2>Exo 1 </h2>';
$merlinExo1 = new Personnage('Merlin', 100, 5, 60); //Personnage Merlin
$arthurExo1 = new Personnage('Arthur', 120, 50); //Personnage Arthur

$arthur->attaque($merlinExo1);
echo $arthurExo1->getNom().'<br>';
echo $arthurExo1->getSante().'<br>';



/**
 * Exercice 2 : Création d'une class équipement qui permet a les propritétés suivantes
 * - Point d'attaque
 * - Point de défense
 * - Durabilité
 * Créer les getters et setters liés
 */
echo '<h2>Exo 2 </h2>';
$bouclier = new Equipement();
$bouclier->setPointAttaque(20)
    ->setPointDefense(5);

echo $bouclier->getDurabilite().'<br>';
echo $bouclier->getPointAttaque().'<br>';
echo $bouclier->getPointDefense().'<br>';


/**
 * Exercice 3 : Poouvoir ajouter un équipement à un personnage
 *
 */
echo '<h2>Exo 3 </h2>';
$arthurExo1->setEquipement($bouclier);

if ($arthurExo1->getEquipement()) {
    echo 'Arthur a un equipement'.'<br>';
} else {
    echo 'Arthur a 0 equipement'.'<br>';
}

if ($merlinExo1->getEquipement()) {
    echo 'Merlin a un equipement'.'<br>';
} else {
    echo 'Merlin a 0 equipement'.'<br>';
}

