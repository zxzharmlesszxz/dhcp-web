<?php

/***
* Admin class
***/

class Admin extends DatabaseObject {
 protected static $table_name = "admins";
 protected static $db_fields = array('adminid', 'login', 'password', 'username', 'email', 'status');

 public $adminid;
 public $login;
 public $password;
 public $username;
 public $email;
 public $status;

 public static function add($login, $password, $username, $email) {
  $new = new static;
  $new->login = trim($login);
  $new->setPassword($password);
  $new->username = trim($username);
  $new->email = trim($email);
  $new->status = 0;
  return $new;
 }

 public function changeStatus() {
  $this->status = ($this->status == 1) ? 0 : 1;
  return $this->save();
 }

 public function setPassword($password) {
  $this->password = md5(trim($password));
 }
}
