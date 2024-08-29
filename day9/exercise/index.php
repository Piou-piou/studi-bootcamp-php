<?php

// avant composer autoload
/*require_once 'src/Personnage.php';
require_once 'src/Equipement.php';

$merlin = new Personnage('Merlin, 100, 100, 100);

*/

/**
 * Savoir refaire et faire fonctionner le code que nous avons dans day9 exercise
 *
 * Petit bonus créer un personnage avec un nom et lui donner des heros
 */

// apres autoload composer
require_once __DIR__ . '/vendor/autoload.php';

use \App\VideoGame\Hero\Personnage;
use \App\VideoGame\Hero\Equipement;

$merlin = new Personnage('merlin', 100, 30);
$arthur = new Personnage('arthur', 100, 30);

$equipement = new Equipement();

echo $merlin->getNom();
