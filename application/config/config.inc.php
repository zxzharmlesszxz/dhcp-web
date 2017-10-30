<?php

/**
* DHCP WEB Project Configuration file
**/

//namespace Core;

$config = array(
 'PROJECT_NAME' => 'DHCP Administrate Tool',
 'PROJECT_VERSION' => '0.0.1',
 'DEFAULT_THEME' => 'Default',
 'CLASS_PATH' => 'application/classes',
 'CONTROLLERS_PATH' => 'application/controllers',
 'MODELS_PATH' => 'application/models',
 'VIEWS_PATH' => 'application/views',
 'mysql' => array(
  'host' => 'localhost',
  'database' => 'dhcp',
  'user' => 'dhcp',
  'password' => 'dhcp',
  'charset' => 'utf8',
  ),
);
