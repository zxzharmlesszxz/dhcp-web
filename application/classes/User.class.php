<?php

/***
* User class
***/

class User extends DatabaseObject {
 protected static $table_name = "users";
 protected static $db_fields = array('userid', 'login', 'password', 'username', 'email', 'uid', 'gid', 'homedir', 'shell', 'status');

 public $userid;
 public $login;
 public $password;
 public $username;
 public $email;
 public $uid;
 public $gid;
 public $homedir;
 public $shell;
 public $status;

 public static function add($login, $password, $username, $email, $homedir = NULL, $shell = NULL, $uid = NULL , $gid = NULL) {
  $new = new static;
  $new->login = trim($login);
  $new->setPassword($password);
  $new->username = trim($username);
  $new->email = trim($email);
  $new->uid = empty($uid) ? config()->DEFAULT_UID : intval(trim($uid));
  $new->gid = empty($gid) ? config()->DEFAULT_GID : intval(trim($gid));
  $new->homedir = empty($homedir) ? '/ftp/incoming/'.$new->login : trim($homedir);
  $new->shell = empty($shell) ? config()->DEFAULT_SHELL : trim($shell);
  $new->status = 0;
  return $new;
 }

 public function changeStatus() {
  $this->status = ($this->status == 1) ? 0 : 1;
  return $this->save();
 }

 public function setPassword($password) {
  $this->password = "{md5}".base64_encode(pack("H*", md5(trim($password))));
  //$this->password = '*'.strtoupper(sha1(sha1(trim($password), TRUE)));
 }
}
