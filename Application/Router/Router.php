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
        echo __METHOD__ . "\n";
        $this->routes = include_once __DIR__ . "/../Config/routes.php";
    }

    public function run()
    {
        echo __METHOD__ . "\n";
        print_r($this->routes);
    }
}