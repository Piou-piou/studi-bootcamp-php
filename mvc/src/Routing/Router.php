<?php

namespace App\Routing;

class Router
{
    private string $controllerName = "App\\Controller\\";
    private string $method;
    private ?string $parameter = null;
    private bool $returnJson = false;

    public function __construct(private string $requestMethod, string $uri)
    {
        if ('/' === $uri) {
            $uri = '/homepage/home';
        }

        $uriExplode = explode('/', $uri);
        array_shift($uriExplode); // pour virer 'info avant le premier / de notre URI

        if ('api' === $uriExplode[0]) {
            $this->returnJson = true;
            $this->controllerName .= 'Api\\';
            array_shift($uriExplode);
        }

        $uriLength = count($uriExplode);

        if (is_numeric($uriExplode[$uriLength-1])) {
            $this->parameter = array_pop($uriExplode);
        }

        $this->method = array_pop($uriExplode);
        $uriLength = count($uriExplode);
        $counter = 1;

        foreach ($uriExplode as $uriPart) {
            if (!$uriPart) {
                continue;
            }

            $separtor = '\\';
            if ($counter === $uriLength) {
                $separtor = '';
            }

            $this->controllerName .= ucfirst($uriPart).$separtor;

            $counter++;
        }
    }

    public function doAction(): string|array
    {
        $controllerName = $this->controllerName;
        $method = $this->method;
        $controller = new $controllerName();

        if ($this->requestMethod == 'POST') {
            // pour gérer les post de formulaire
            if (null !== $this->parameter) {
                $result = $controller->$method($this->parameter, $_POST);
            } else {
                $result = $controller->$method($_POST);
            }
        } else {
            if (null !== $this->parameter) {
                $result = $controller->$method($this->parameter);
            } else {
                $result = $controller->$method();
            }
        }

        if (true === $this->returnJson) {
            return json_encode($result);
        }

        return $result;
    }

    public function isReturnJson(): bool
    {
        return $this->returnJson;
    }
}
