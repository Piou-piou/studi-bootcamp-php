<?php

//exercice 1 : Dans le cadre de l'agence de voyagge Studi Voyage.
// Nous souhaitons afficher la listes des annonces de voyage comprenant les informations suivantes :
// - titre
// - nom_hotel
// - lieu
// - min_duree
// - max_duree
// - remise
// - prix
// - description
// - note_moyenne
// ici utiliser le tableau pour gérer ces données et les afficher dans votre HTML
/*$annonces = [
    [
        'titre' => 'Corse ile rousse',
        'nom_hotel' => 'Beluga beach',
        'min_duree' => 7,
        'max_duree' => 10,
        'unite_duree' => 'jours',
        'remise' => 53,
        'prix' => 578,
        'devise' => '€',
        'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
        'note_moyenne' => 4.8,
    ],
    [
        'titre' => 'Bora Bora',
        'nom_hotel' => 'Bora beach',
        'min_duree' => 10,
        'max_duree' => 12,
        'unite_duree' => 'jours',
        'remise' => 51,
        'prix' => 1025,
        'devise' => '€',
        'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
        'note_moyenne' => 4.9,
    ],
    [
        'titre' => 'Seychelles',
        'nom_hotel' => 'Seychelles beach',
        'min_duree' => 12,
        'max_duree' => 15,
        'unite_duree' => 'jours',
        'remise' => 62,
        'prix' => 1530,
        'devise' => '€',
        'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
        'note_moyenne' => 4.7,
    ],
];*/


//exercice 2 : Dans le cadre de l'agence de voyage Studi Voyage.
// Nous souhaitons afficher la listes des annonces de voyage comprenant les informations suivantes :
// - titre
// - nom_hotel
// - lieu
// - min_duree
// - max_duree
// - remise
// - prix
// - description
// - note_moyenne
// ici utiliser une base de données pour gérer ces données et les afficher dans votre HTML
$pdo = new PDO("mysql:host=localhost;dbname=studi_voyage;port=3307", 'root', 'test');

$query = $pdo->query('SELECT * FROM annonce');
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);


//exercice bonus : Dans le cadre de l'agence de voyagge Studi Voyage.
// créer une page permettant d'afficher une seule annonce de voyage


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
            <h1>Ma super agence</h1>

            <div class="container">
                <div class="row">
                    <?php foreach ($annonces as $annonce) { ?>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $annonce['titre'] ?></h5>
                                        <p class="card-text"><?php echo $annonce['nom_hotel'] ?></p>
                                        <p class="card-text">Séjour allant de <?php echo $annonce['min_duree'] ?> à <?php echo $annonce['max_duree'] ?> jour</p>
                                        <p class="card-text"><?php echo $annonce['description']; ?></p>
                                        <p class="card-text">A partir de <?php echo $annonce['prix'].' €'; ?></p>
<!--                                     exo bonus avec page annonce.php   <a href="annonce.php?annonce_id=--><?php //echo $annonce['id'] ?><!--" class="btn btn-primary">Voir en détail</a>-->
                                    </div>
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
