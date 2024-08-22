<?php

/**
- Exercice 1 : En reprenant le code corrigé de l'exo3
 * https://github.com/Piou-piou/studi-bootcamp-php/blob/main/day3/correction-exercice.php
 * Créez un lien vous permettant d'afficher une seule annonce en fonction de son id
 * Pensez au $_GET

*/

/**
 * Exercice 2 : Touver un moyen de ne plus copier/coller toute la partie <head> ainsi que <header> avec <nav>
 * dans le fichier index.php et annonce.php
 */

/**
 * Exercice Bonus : créer un formulaire permettant d'ajouter une annonce dans notre agence
 * pensez à utiliser un formulaire et récupérer les valeurs via $_POST
 */

require_once 'pdo.php';

$query = $pdo->query('SELECT * FROM voiture');
$voitures = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mon super garage</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php">lien vers index</a>
            </nav>
        </header>

        <main>
            <h1>Mon super garage</h1>

            <div class="container">
                <div class="row">
                    <?php foreach ($voitures as $voiture) { ?>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $voiture['marque'].' modèle '.$voiture['modele'].' : '.$voiture['immatriculation']; ?></h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <!-- ajout du paramètre voiture_id dans l'url pour pouvoir récupérer voiture par voiture sur la page voirutre  -->
                                    <!-- la valeur de id changeà chaque tour dans le foreach et correspond à une voiture -->
                                    <!-- que l'on récupérera via $_GET dans la page voiture.php -->
                                    <a href="voiture.php?voiture_id=<?php echo $voiture['id'] ?>" class="btn btn-primary">Voir en détail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </main>

        <footer></footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
