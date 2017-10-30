<?php

/**
* Controller for Subnet Class
**/

class Controller_Subnets extends Controller {
 protected $query;

 public function __construct() {
  parent::__construct();
  $this->model = new Model_Subnets();
  $this->query = $_REQUEST;
 }

 public function action_index() {
  $this->view->generate('subnets_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit() {
  $this->view->generate('subnet_edit.php', 'template_view.php', $this->model->get(intval($this->query['subnet_id'])));
 }

 public function action_create() {
  $this->view->ajax($this->model->create($this->query['subnet']));
 }

 public function action_delete() {
  $subnet = $this->model->get(intval($this->query['subnet_id']));
  $data = $this->model->delete(intval($subnet->subnet_id));
  $this->view->ajax($data);
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['subnet']));
 }

 public function action_show() {
  $items = $this->model->get_data();
  foreach ($items->keys() as $subnet_id) {
   if ($items->getItem($subnet_id)->subnet_id == $this->query['subnet_id']) {
    $data = $items->getItem($subnet_id);
   }
  }
  $this->view->generate('subnet_show.php', 'template_view.php', $data);
 }
}
