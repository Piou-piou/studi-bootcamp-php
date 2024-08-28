<?php

require_once 'config/config.php';

$title = 'Créer un compte';
$error = null;

// test si la méthode envoyée est bien POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // test des données du formulaire posté afin de voir si username ou password sont vides
    if (!$_POST['username'] || !$_POST['password']) {
        $error = 'Identifiants invalides';
    } else {
        // sinon on enregistre notre utilisateur en base
        $query = DbConnection::getPdo()->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
        $query->bindParam('username', $_POST['username']);

        // ici pour plus de sécurité on hash notre mot de passe afin de le protéger
        // et au cas ou ne pas garder le mdp en clair dans la base en cas de vol de données
        // on vérifie un mot de passe hashé via password_verify
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $query->bindParam('password', $password);

        if (!$query->execute()) {
            $error = 'une erreur est survenue';
        } else {
            $_SESSION['success_message'] = 'Compté créé, vous pouvez vous connceter';

            // header Location ne doit jamais être appelé après de l'HTML dans vos pages
            // sinon vous aurez l'erreur
            // header already sent ...
            header('Location: connection.php');
        }
    }
}

require_once 'templates/head.php';
require_once 'templates/header.php';

?>

<div class="container">
    <h1>Créer un compte</h1>

    <!-- Ici si l'erreur est différente de false, null ou  '' on affiche un message d'alerte montrant notre erreur -->
    <?php if ($error): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $error; ?>
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
            <button class="btn btn-primary" type="submit">Inscription</button>
        </div>
    </form>
</div>



<?php require_once 'templates/footer.php'; ?>
