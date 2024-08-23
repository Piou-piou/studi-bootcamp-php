<?php

/**
 * Exercice 1 : préparer la page d'ajout d'une nouvelle annonce de voyage avec tous les valeurs (champs))
 * présents dans votre table dans votre base de données
 * et ensuite gérer l'ajout via un post d'un formulaire et insérer les données
 * Pennsez $_POST
 */

/**
 * Exercice 2
 * gérer à minimum la sécurité de la requête en utilisant les bindParam et la méthode prepare de $pdo
 */


/**
 * Exercice 3
 * renvoyer un message de succès ou erreur sur la page d'accueil (index.php) en cas de succes
 * d'ajout de votre annonce ou d'échec d'ajout
 * pesnez $_GET
 */


/**
 * Exercice 4 Bonus
 * reprendre l'exercice 3 et tenter de faire passer le message via $_SESSION
 * pensez session_start();
 */

require_once 'config/pdo.php';

$query = $pdo->query('SELECT * FROM annonce');
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);


require_once 'templates/head.php';
require_once 'templates/header.php';
?>

        <main>
            <h1>Ma super agence <?php echo $_SESSION['test']; ?></h1>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['message']; ?>
                    <?php unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>

            <div class="container">
                <div class="row">
                    <?php foreach ($annonces as $annonce): ?>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $annonce['titre'] ?></h5>
                                        <p class="card-text"><?php echo $annonce['nom_hotel'] ?></p>
                                        <p class="card-text">Séjour allant de <?php echo $annonce['min_duree'] ?> à <?php echo $annonce['max_duree'] ?> jour</p>
                                        <p class="card-text">A partir de <?php echo $annonce['prix'].' €'; ?></p>
                                        <a href="annonce.php?annonce_id=<?php echo $annonce['id']; ?>">Voir en détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>

        <?php require_once 'templates/footer.php'; ?>
