<?php

$annonce_id = $_GET['annonce_id'];

$pdo = new PDO("mysql:host=localhost;dbname=studi_voyage;port=3307", 'root', 'test');



$query = $pdo->prepare("SELECT * FROM annonce where id = ".$annonce_id);
$annonce = $query->fetch(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Annonce</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php">Accueil</a>
            </nav>
        </header>

        <main>
            <h1>Ma super agence</h1>
            <a href="index.php">retour à la liste</a>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $annonce['titre'] ?></h5>
                                    <p class="card-text"><?php echo $annonce['nom_hotel'] ?></p>
                                    <p class="card-text">Lieu : <?php echo $annonce['lieu'] ?></p>
                                    <p class="card-text">Note moyenne : <?php echo $annonce['note_moyenne'] ?></p>
                                    <p class="card-text">Séjour allant de <?php echo $annonce['min_duree'] ?> à <?php echo $annonce['max_duree'] ?> jour</p>
                                    <p class="card-text"><?php echo $annonce['description']; ?></p>
                                    <p class="card-text">A partir de <?php echo $annonce['prix'].' €'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer></footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
