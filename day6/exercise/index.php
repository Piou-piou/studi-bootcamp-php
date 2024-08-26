<?php

require_once 'Personnage.php';


/**
 * Exercice 1 : faire en sorte q'un personnage puisse se défendre de la part d'un autre
 * un personnage se défend d'un attaque reçue
 */

/**
 * Exercice 2 : Création d'une class équipement qui permet a les propritétés suivantes
 * - Point d'attaque
 * - Point de défense
 * - Durabilité
 * Créer les getters et setters liés
 */

/**
 * Exercice 3 : POouvoir ajouter un équipement à un personnage
 *
 */


/**
 * Exo Bonus : afficher la liste des equipements dans le navigateur
 * pensez foreach ;)
 */

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
