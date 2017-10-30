<?php

/**
* ProAUT Project Configuration file
**/

//namespace Core;

$config = array(
 'PROJECT_NAME' => 'ProFTPd Administrate Users Tool',
 'PROJECT_VERSION' => '0.0.1',
 'DEFAULT_THEME' => 'Default',
 'CLASS_PATH' => 'application/classes',
 'CONTROLLERS_PATH' => 'application/controllers',
 'MODELS_PATH' => 'application/models',
 'VIEWS_PATH' => 'application/views',
 'DEFAULT_UID' => 65534,
 'DEFAULT_GID' => 65534,
 'DEFAULT_SHELL' => '/bin/nonexistent',
 'QUOTA' => true,
 'mysql' => array(
  'host' => 'localhost',
  'database' => 'proftp',
  'user' => 'proftp',
  'password' => 'proftp',
  'charset' => 'utf8',
  ),
);
