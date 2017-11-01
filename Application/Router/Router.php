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
        echo $uri;
        foreach ($this->routes as $uriPattern => $path)
        {
            echo "<br>$uriPattern = $path";
            if (preg_match("~$uriPattern", $uri))
            {
                echo "+";
            }
        }
    }
}