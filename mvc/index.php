<?php

use App\Routing\Router;

require_once __DIR__.'/vendor/autoload.php';

session_start();

$error = null;
$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$data = $router->doAction();

if ($router->isReturnJson()) {
    echo $data;
} else {
    $error = $data['message'] ?? null;
    $page = 'templates/'.$data['template'].'.php';

    require_once 'templates/base_template.php';
}
