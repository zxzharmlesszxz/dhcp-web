<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 11:46
 */

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include_once __DIR__ . "/../Config/routes.php";
    }

    private function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path)
        {
            if (preg_match("~$uriPattern~", $uri))
            {
                list($controller, $action) = explode('/', $path);
                $controller = ucfirst($controller) . 'Controller';
                $action = 'action' . ucfirst($action);
                $controllerFile = __DIR__ . "/../Controllers/" . $controller . ".php";

                if (file_exists($controllerFile))
                {
                    include_once $controllerFile;
                }

                $controllerObject = new $controller;
                $result = $controllerObject->$action();

                if ($result != null)
                {
                    break;
                }
            }
        }
    }
}