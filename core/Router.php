<?php

class Router
{
    public $routes = [
        'POST' => [],
        'GET' => [],
        'PUT' => [],
        'DEL' => [],
    ];

    public static function load($file)
    {
        $router = new static;

        require __DIR__ . './../routes/web.php';

        return $router;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function put($uri, $controller)
    {
        $this->routes['PUT'][$uri] = $controller;
    }

    public function del($uri, $controller)
    {
        $this->routes['DEL'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        return $this->callAction(
            ...explode('@', $this->routes[$requestType]['/*'])
        );

    }

    protected function callAction($controller, $action)
    {

        $controller = 'App\\Controllers\\' . $controller;
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                '{controller} does not responsed to the {$action} action'
            );
        }

        return $controller->$action();
    }
}
