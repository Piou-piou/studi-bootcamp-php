<?php


require_once 'config/pdo.php';

$query = $pdo->query('SELECT * FROM voiture');
$voitures = $query->fetchAll(PDO::FETCH_ASSOC);

require_once 'templates/head.php';
require_once 'templates/header.php';
?>

        <main>
            <h1>Ma super garage</h1>

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

        <?php require_once 'templates/footer.php'; ?>
