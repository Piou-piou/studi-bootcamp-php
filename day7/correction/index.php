<?php

require_once 'config/DbConnection.php';
require_once 'config/session.php';

// partout dans le code dès que l'on voudra utiliser pdo
// au lieu de passer par $pdo on préférera utiliser DbConnection::getPdo() car pus robuste
// et permet l'autocomplétion et de futurs tests
$query = DbConnection::getPdo()->query('SELECT * FROM voiture');
$voitures = $query->fetchAll(PDO::FETCH_ASSOC);


require_once 'templates/head.php';
require_once 'templates/header.php';

/**
 * Exercice 1 : sur la page inscription.php
 * après l'inscription avec succes rediriger sur la page de connexion
 * et sur cette page afficher un message de succes indiquant
 * "Compte créé avec succès"
 */

/**
 * Exercice 2 : trouver un moyen de sauvegarder l'utilisateur après connexion
 * entre toutes les pages et afficher le pseudo de l'utilisateur sur toutes les pages
 */

?>

<main>
    <h1>Mon garage <?php echo $_SESSION['test'] ?? null; ?></h1>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success_message']; ?>
            <?php unset($_SESSION['success_message']); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <?php foreach ($voitures as $voiture): ?>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $voiture['marque'] . ' modèle ' . $voiture['modele'] . ' : ' . $voiture['immatriculation']; ?></h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <!-- ajout du paramètre voiture_id dans l'url pour pouvoir récupérer voiture par voiture sur la page voirutre  -->
                                <!-- la valeur de id changeà chaque tour dans le foreach et correspond à une voiture -->
                                <!-- que l'on récupérera via $_GET dans la page voiture.php -->
                                <a href="voiture.php?voiture_id=<?php echo $voiture['id'] ?>" class="btn btn-primary">Voir
                                    en détail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php require_once 'templates/footer.php'; ?>