<?php
    //récupération BDD
    $pdo = new PDO("mysql:host=localhost;dbname=studi_voyage;port=3307", 'root', 'test');


    $query = $pdo->query('SELECT * FROM annonce');
    $annonces = $query->fetchAll(PDO::FETCH_ASSOC);


    $boraBoraQuery  = $pdo->query('SELECT * FROM annonce WHERE id = 2');
    $boraBora = $boraBoraQuery->fetch(PDO::FETCH_ASSOC);

    echo $boraBora['titre'];
    echo $boraBora['lieu'];
    echo $boraBora['min_duree'];


    //sans la BDD
    /*$annonces = [
        [
            'titre' => 'Corse, Ile Rousse',
            'nom_hotel' => 'Maria Beach & Sun *****',
            'lieu' => 'Corse, Ile Rousse',
            'min_duree' => 5,
            'max_duree' => 7,
            'remise' => 53,
            'prix' => 562,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae eros luctus, sagittis urna vitae, iaculis lectus.',
            'note_moyenne' => 4.9,
        ],
        [
            'titre' => 'Bora Bora',
            'nom_hotel' => 'Maria Beach & Sun *****',
            'lieu' => 'Bora Bora',
            'min_duree' => 8,
            'max_duree' => 10,
            'remise' => 51,
            'prix' => 1060,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae eros luctus, sagittis urna vitae, iaculis lectus.',
            'note_moyenne' => 4.7,
        ],
        [
            'titre' => 'Seychelles',
            'nom_hotel' => 'Maria Beach & Sun *****',
            'lieu' => 'Praslin',
            'min_duree' => 10,
            'max_duree' => 12,
            'remise' => 65,
            'prix' => 5650,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae eros luctus, sagittis urna vitae, iaculis lectus.',
            'note_moyenne' => 4.9,
        ],
    ];*/
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Agence de voyage - StudiVoyage</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <header>

        </header>

        <main class="container ">
            <h1>Les plus recherchés</h1>

            <div class="row">
                <?php foreach ($annonces as $annonce) { ?>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $annonce['titre'] ?></h5>
                                <p class="card-text"><?php echo $annonce['nom_hotel'] ?></p>
                                <p class="card-text">Séjour allant de <?php echo $annonce['min_duree'] ?> à <?php echo $annonce['max_duree'] ?> jours</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </main>

        <footer>

        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
