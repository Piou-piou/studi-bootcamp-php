<?php

require_once 'config/pdo.php';

$annonce_id = $_GET['annonce_id'];

$query = $pdo->query("SELECT * FROM annonce where id = ".$annonce_id);
$annonce = $query->fetch(PDO::FETCH_ASSOC);

$title = 'Annonce : '.$annonce['titre'];

require_once 'templates/head.php';
require_once 'templates/header.php';
?>
        <main>
            <h1>Ma super agence</h1>
            <a href="index.php">retour à la liste</a>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mb-12 mb-sm-0">
                        <div class="col-sm-12 mb-12 mb-sm-0">
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

    <?php require_once 'templates/footer.php'; ?>
