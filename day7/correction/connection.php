<?php

require_once 'config/DbConnection.php';
require_once 'config/session.php';

$title = 'Connexion';

$error = null;

// test si la méthode envoyée est bien POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // test des données du formulaire posté afin de voir si username ou password sont vides
    if (!$_POST['username'] || !$_POST['password']) {
        $error = 'Identifiants invalides';
    } else {
        // ici on va récupérer notre utilisateur uniquement avec un username car le mot de passe est hashé en base de données
        // donc on ne peut pas le retrouver. On fera la vérification par la suite du mdp
        $query = DbConnection::getPdo()->prepare('SELECT * FROM user WHERE username = :username');
        $query->bindParam('username', $_POST['username']);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        // si pas d'utilisateur avec ce username en base définie notre erreur
        if (!$user) {
            $error = 'Identifiants invalides';
        } else {
            //si utilisateur trouvé alors on vérifie que le mot de passe tapé dans le formulaire corresponde bien à celui hashé en bdd
            $passwordOk = password_verify($_POST['password'], $user['password']);

            // si pas ok erreur
            if (!$passwordOk) {
                $error = 'Identifiants invalides';
            } else {
                // si ok on redirige

                //save l'utilisateur en session
                unset($user['password']);
                $_SESSION['user'] = $user;

                header('Location: index.php');
            }
        }
    }
}

require_once 'templates/head.php';
require_once 'templates/header.php';
?>

<div class="container">
    <h1>Se connecter</h1>

    <?php if ($error): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <!-- récupération du la session success_message sii existante et on l'affiche puis on la détruit -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="username" name="username" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Connexion</button>
        </div>
    </form>
</div>



<?php require_once 'templates/footer.php'; ?>
