<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 11:24
 */

print_r(__FILE__);


$config = include_once "Config/config.php";

print_r($config);

require_once "Router/Router.php";

$router = new Router();

$router->run();