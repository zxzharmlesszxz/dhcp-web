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
                $internalPath = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalPath);
                $controller = ucfirst(array_shift($segments)) . 'Controller';
                $action = 'action' . ucfirst(array_shift($segments));
                $params = $segments;
                $controllerFile = __DIR__ . "/../Controllers/" . $controller . ".php";

                if (file_exists($controllerFile))
                {
                    include_once $controllerFile;
                }

                $controllerObject = new $controller;
                $result = call_user_func_array(array($controllerObject, $action), $params);

                print_r($params);

                if ($result != null)
                {
                    break;
                }
            }
        }
    }
}