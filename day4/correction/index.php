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

require_once 'config/pdo.php';

$query = $pdo->query('SELECT * FROM annonce');
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

require_once 'templates/head.php';
require_once 'templates/header.php';
?>

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
                                        <a href="annonce.php?annonce_id=<?php echo $annonce['id']; ?>">Voir en détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </main>

        <?php require_once 'templates/footer.php'; ?>
