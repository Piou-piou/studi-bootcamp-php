<?php

require_once 'config/DbConnection.php';


$title = 'Connexion';

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST['username'] || !$_POST['password']) {
        $error = 'Identifiants invalides';
    } else {
        $query = DbConnection::getPdo()->prepare('SELECT * FROM user WHERE username = :username');
        $query->bindParam('username', $_POST['username']);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $error = 'Identifiants invalides';
        } else {
            $passwordOk = password_verify($_POST['password'], $user['password']);

            if (!$passwordOk) {
                $error = 'Identifiants invalides';
            } else {
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
