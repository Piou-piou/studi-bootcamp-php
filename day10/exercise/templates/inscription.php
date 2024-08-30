<div class="container">
    <h1>Créer un compte</h1>

    <!-- Ici si l'erreur est différente de false, null ou  '' on affiche un message d'alerte montrant notre erreur -->
    <?php if ($error): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="index.php?page=inscription" method="post">
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

