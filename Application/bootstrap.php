<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 11:24
 */

$config = include_once "Config/config.php";

require_once "Router/Router.php";

$router = new Router();

$router->run();