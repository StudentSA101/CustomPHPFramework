<?php
/**
 * Class that controls the routing of the framework
 */
class Router
{
    /**
     * Routes array with the verbs that can be used for routes
     *
     * @var array
     */
    public $routes = [
        'POST' => [],
        'GET' => [],
        'PUT' => [],
        'DEL' => [],
    ];
    /**
     * Static Function to load up routes.
     *
     * @param [type] $file
     * @return void
     */
    public static function load($file)
    {
        $router = new static;

        require __DIR__ . './../routes/web.php';

        return $router;
    }
    /**
     * Post Verb
     *
     * @param String $uri
     * @param String $controller
     * @return void
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }
    /**
     * Get Verb
     *
     * @param String $uri
     * @param String $controller
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }
    /**
     * Get put
     *
     * @param String $uri
     * @param String $controller
     * @return void
     */
    public function put($uri, $controller)
    {
        $this->routes['PUT'][$uri] = $controller;
    }
    /**
     * Get del
     *
     * @param String $uri
     * @param String $controller
     * @return void
     */

    public function del($uri, $controller)
    {
        $this->routes['DEL'][$uri] = $controller;
    }

    /**
     * Resolve uri to controller
     *
     * @param String $uri
     * @param String $requestType
     * @return void
     */
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
    /**
     * Function to call controller class method
     *
     * @param [type] $controller
     * @param [type] $action
     * @return void
     */
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
