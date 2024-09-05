<?php

require_once __DIR__.'/vendor/autoload.php';

session_start();

// via le .htacess on redirige toujours toutes les pages sur ce fichier
// index.php pour gérer l'affichage comme on le souhaite
// et aller chercher le controller et la méthode de manière automatique

// ic on récupère l'URI de l'url
// uri = partie interne de l"url, ce qiu se situe après https://monsite.com
$uri = $_SERVER['REQUEST_URI'];

// explode transforme une chaine de caractère en tableau en fondction d'un séprateur
// ici le /
// ici je choisi de séparer mon URi en 2 parties
// premier partie = MonControler
// seconde partie la méthode du controller
$uriParts = explode('/', $uri);


// si pas d'uriParts alors onn est sur l'accueil
if (count($uriParts) === 2 && $uriParts[1] === '') {
    $uriParts[1] = 'homepage';
    $uriParts[2] = 'home';
}

// on enelve la premiere partie car l'uri commence par un slash donc vide
unset($uriParts[0]);

// ici on ajoute un majusccule au premier caractère car une class php doit toujours commencer par une maj
$controller = ucfirst($uriParts[1]);

// la partie 2 correspond à la méthode appelée
$method = $uriParts[2];

// App\Controller\Inscrption pour la page inscription
// App\Controller\Login pour la page login
// ucfisrt permet de mettre la première lettre en majuscule
$controllerName = 'App\\Controller\\'.$controller;

// ici on instancie la class qui va gérer notre formulaire et ses erreurs
$controller = new $controllerName();

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // on appelle une méthode pour gérer notre formulare
    // on stock le résultat dans un var pour voir si erreur ou
    // si erreur le reoutr est diféérent de true
    $data = $controller->$method($_POST);
    if ($data['success'] !== true) {
        $error = $data['message'];
    }
} else {
    $data = $controller->$method();
}

// methode GET, on récupère le chemin de la page

$page = 'templates/'.$data['template'].'.php';

require_once 'templates/base_template.php';