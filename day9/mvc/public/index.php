<?php

require_once __DIR__.'/../vendor/autoload.php';


$page = '../templates/';
if (isset($_GET['page'])) {
    $page .= $_GET['page'];
} else {
    $page .= 'index';
}

$page .= '.php';

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Mon super garage</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php?page=ajout_voiture">Ajouter une voiture</a></li>
                    <li><a href="index.php?page=connexion">Se connecter</a></li>
                </ul>
            </nav>
        </header>

        <main class="container">
            <?php
            require_once $page;
            ?>
        </main>

        <footer>
            Copyright studi
        </footer>
    </body>
</html>
