<?php

/**
* Controller Class
* Type: abstract
**/

//namespace Core;

abstract class Controller {
 
 public $model;
 public $view;
 
 public function __construct() {
  $this->view = new View();
 }

 abstract public function action_index();
 
 public function action_error() {
  $this->view->generate('404_view.php', 'template_view.php', "Module/Method doesn't exists");
 }
}
