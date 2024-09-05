<?php

use App\Routing\Router;

require_once __DIR__.'/vendor/autoload.php';

$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

echo $router->doAction();
