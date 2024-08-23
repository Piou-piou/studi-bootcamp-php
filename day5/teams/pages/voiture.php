<?php

require_once '../exercise/config/pdo.php';

$voiture_id = $_GET['voiture_id'];

$query = $pdo->query("SELECT * FROM voiture where id = ".$voiture_id);
$voiture = $query->fetch(PDO::FETCH_ASSOC);

?>

<h1>Voiture : <?php echo $voiture['immatriculation']; ?></h1>

<div class="container">
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $voiture['marque'].' modèle '.$voiture['modele'].' : '.$voiture['immatriculation']; ?></h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                </div>
            </div>
        </div>
    </div>

</div>
