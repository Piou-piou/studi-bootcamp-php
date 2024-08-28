<header>
    <nav>
        <a href="index.php">lien vers index</a>
        <a href="ajout_voiture.php">Ajouter un voiture</a>
        <a href="inscription.php">Inscription</a>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="logout.php">Déconnexion</a> |
            <a href="profile.php">Mon compte : <?php echo $_SESSION['user']['username'] ?></a>
        <?php else: ?>
            <a href="connection.php">Connexion</a>
        <?php endif; ?>
    </nav>
</header>
