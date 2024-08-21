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
$voitures = [
    0 => [
        'marque' => 'peugeot',
        'annee' => 2011,
        'modele' => 208,
        'km' => 150000,
        'type_motorisation' => 'essence',
        'etat' => 'médiocre',
    ],

    1 => [
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


//exercice 2 : Dans le cadre de l'agence de voyagge Studi Voyage.
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
//$pdo = new PDO("mysql:host=localhost;dbname=garage;port=3306", 'root', '');

//$query = $pdo->query('SELECT * FROM voiture');
//$voitures = $query->fetchAll(PDO::FETCH_ASSOC);


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
                <a href="test.php">lien vers test</a>
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
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                    <img width="100" height="100" src="<?php echo $voiture['image'] ?>" alt="">
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
