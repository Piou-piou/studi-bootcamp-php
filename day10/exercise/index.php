<?php

require_once __DIR__.'/vendor/autoload.php';


//monsite.com
//monsite;com/mon-controller/mon-action/parametre
//monsite;com/mon-controller/mon-action/parametre1/paramtere

//exemples concrets
// /inscription en get c'est pour afficher le form
// /inscription/managePostForm en post pour gérer la création
// ici on aura le Controller Inscription qui appelera la méthode managePostForm

$uri = $_SERVER['REQUEST_URI'];
$uriTable = explode('/', $uri);

$controllerName = $uriTable[1];
$actionName = '';
if (isset($uriTable[2])) {
    $actionName = $uriTable[2];
}

echo $controllerName.'<br>';
echo $actionName;

echo '<pre>';
print_r($uriTable);
echo '</pre>';

die;


$pageName = $_GET['page'] ?? 'homepage';
$page = 'templates/'.$pageName.'.php';
$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // App\Controller\Inscrption pour la page inscription
    // App\Controller\Login pour la page login
    // ucfisrt permet de mettre la première lettre en majuscule
    $controllerName = 'App\\Controller\\'.ucfirst($pageName);

    // ici on instancie la class qui va gérer notre formulaire et ses erreurs
    $controller = new $controllerName();

    // on appelle une méthode pour gérer notre formulare
    // on stock le résultat dans un var pour voir si erreur ou
    // si erreur le reoutr est diféérent de true
    $result = $controller->managePostForm($_POST);
    if ($result !== true) {
        $error = $result;
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            Mon super garage
        </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php">lien vers index</a>
                <a href="index.php?page=ajout_voiture">Ajouter un voiture</a>
                <a href="index.php?page=inscription">Inscription</a>
            </nav>
        </header>

        <main class="container">
            <!-- inclure mon contenu -->
            <?php require_once $page ?>
        </main>

        <footer>
            Copyrights 2024
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
    </body>
</html>
