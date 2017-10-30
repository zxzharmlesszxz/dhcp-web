<?php

namespace Module\User;
use Core\Member;

/**
 * Class User
 * @package Core\Module\User
 */
class User extends Member
{
    /**
     * @var string
     */
    protected static $table_name = "user";
    /**
     * @var array
     */
    protected static $db_fields = array('id', 'login', 'password', 'username', 'email', 'status');

    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $password;
    /**
     * @var
     */
    protected $status;
    /**
     * @var
     */
    public $login;
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $email;

    /**
     * @param array $item
     * @return static
     */
    public static function add(array $item)
    {
        $new = new static;
        $new->login = trim($item['login']);
        $new->setPassword($item['password']);
        $new->username = trim($item['username']);
        $new->email = trim($item['email']);
        $new->status = 0;
        return $new;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = md5(trim($password));
    }

    /**
     * @return bool
     */
    public function changeStatus()
    {
        $this->status = ($this->status == 1) ? 0 : 1;
        return $this->save();
    }
}
