<?php

require_once 'config/DbConnection.php';


$title = 'Créer un compte';

require_once 'templates/head.php';
require_once 'templates/header.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST['username'] || !$_POST['password']) {
        $error = 'Identifiants invalides';
    } else {
        $query = DbConnection::getPdo()->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
        $query->bindParam('username', $_POST['username']);

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $query->bindParam('password', $password);

        if (!$query->execute()) {
            $error = 'une erreur est survenue';
        } else {
            echo 'success';
        }
    }
}

?>

<div class="container">
    <h1>Créer un compte</h1>

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
