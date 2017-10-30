<?php

/**
* Controller for Admin Class
**/

class Controller_Admins extends Controller {
 protected $query;
 
 public function __construct() {
  parent::__construct();
  $this->model = new Model_Admins();
  $this->query = $_REQUEST;
 }

 public function action_index() {
  $this->view->generate('admins_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit() {
  $this->view->generate('admin_edit.php', 'template_view.php', $this->model->get(intval($this->query['adminid'])));
 }

 public function action_changeStatus() {
  $this->view->ajax($this->model->changeStatus(intval($this->query['adminid'])));
 }

 public function action_create() {
  $this->view->ajax($this->model->create($this->query['admin']));
 }

 public function action_delete() {
  $this->view->ajax($this->model->delete(intval($this->model->get(intval($this->query['adminid']))->adminid)));
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['admin']));
 }
}
