<?php

// fonction qui gère une somme entre 2 ou 3 chiffres / nombres et afficher les résultats via des echos
// attention au typage
// pas de echo dans la fonction

function sum(float|int $number1, float|int $number2, float|int $number3 = 0): float|int
{
    return $number1 + $number2 + $number3;
}

echo 'Résultat exo 1 <br>';
echo 'Somme avec 2 chiffres '.sum(10, 10).'<br>';
echo 'Somme avec 3 chiffres '.sum(10, 10, 10);



// fonction qui gère un division entre 2 nombre.
// PS: attention au 0
function divide(float|int $number1, float|int $number2): float|int|string
{
    if ($number2 == 0) {
        return 'Erreur : division par 0 impossible';
    }

    return $number1 / $number2;
}

echo '<br><br>Résultat exo 2 <br>';
echo 'Division 1 '.divide(10.5, 10).'<br>';
echo 'Division 2 avec un  0 : '.divide(10, 0).'<br>';



// fonction qui affiche bravo si une moyenne donnée est au dessus de 15
// si la moyenne est entre 10 et 15 peut mieux faire
// si la moyenne est entre 8 et 10 afficher pas ouf
// si en dessous de 8 afficher bon redoublement !
function averageCongratulation(int $average): string
{
    /*return match (true) {
        $average > 15 => 'Bravo !!',
        $average > 10 && $average <= 15 => 'Peut mieux faire.',
        $average > 8 && $average <= 10 => 'Pas ouf.',
        default => 'Bon redoublement !'
    };*/

    if ($average > 15) {
        return 'Bravo !!';
    } elseif ($average > 10 && $average <= 15) {
        return 'Peut mieux faire.';
    } elseif ($average > 8 && $average <= 10) {
        return 'Pas ouf.';
    } else {
        return 'Bon redoublement !';
    }
}

echo '<br><br>Résultat exo 3 <br>';
echo  averageCongratulation(16).'<br>';
echo  averageCongratulation(12).'<br>';
echo  averageCongratulation(9).'<br>';
echo  averageCongratulation(5).'<br>';



// bonus
// faire une fonction qui affiche une moyenne en fonction d'un nombre variable de notes
function average(array $notes): int|float|string
{
    if (empty($notes)) {
        return 'Erreur : Il faut ajouter au moins 2 notes supérieures à 0';
    }

    return round(array_sum($notes) / count($notes));
}

echo '<br><br>Résultat exo bonus <br>';
echo  average([10, 15, 12, 13, 5]).'<br>';
echo  average([10.2, 15.8, 12.7, 13.1, 5.2]).'<br>';
echo  average([]).'<br>';
echo  average([5, 6, 7, 8, 9]).'<br>';
