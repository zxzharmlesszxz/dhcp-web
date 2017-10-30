<?php
//use Core\Config;
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

Registry::_set('config', Config::getInstance());
Registry::_set('database', new MySQL_Database);

function __autoload($class){
 @include_once __DIR__."/classes/${class}.class.php";
}

function config(){
 return Registry::_get('config');
}

function db(){
 return Registry::_get('database');
}

Route::start();
