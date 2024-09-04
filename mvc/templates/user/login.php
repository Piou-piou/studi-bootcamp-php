<h1>Se connecter</h1>

<?php if ($error): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-warning" role="alert">
        <?php
        echo $_SESSION['success_message'];
        unset($_SESSION['success_message']);
        ?>
    </div>
<?php endif; ?>

<form action="/login/validate" method="post">
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
