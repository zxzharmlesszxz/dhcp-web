<?php

namespace Module\User;

use Core\Core;

/**
 * Class Model
 * @package Module\User
 */
class Model extends \Core\Model
{
    protected function ajax(array $items)
    {
        $content = array();
        foreach ($items as $item) {
            $content['data'][] = array('id' => $item->id, 'login' => $item->login, 'username' => $item->username, 'email' => $item->email, 'status' => $item->status);
        }
        return $content;
    }

    protected function str(array $items)
    {
        $content = "";
        foreach ($items as $item) {
            $content .= "<tr><td>$item->login</td><td>$item->username</td><td>$item->email</td><td>$item->status</td></tr>\n";
        }
        return $content;
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        $template = file_get_contents(__DIR__ . '/../View/users_view.php');
        if (isset($query['ajax']) and $query['ajax'] == true) {
            return $this->ajax(User::find_all());
        } else {
            return str_replace('%content%', $this->str(User::find_all()), $template);
        }
    }

    public function login()
    {
        $session = Core::getInstance()->Session;
        $query = func_get_arg(0)->getQuery();
        $content = "";
        if (!empty($query) && isset($query['login']) && isset($query['password'])) {
            $user = User::find_by_scope(array('login' => $query['login'], 'password' => md5($query['password'])))[0];
        }
        if (isset($user)) {
            $content = $user->login;
            $template = "<b>Welcome %content%.</b>";
            $session->login();
            $session->set('login', $user->login);
            $session->set('type', 'user');
        } elseif ($session->check_login() and $session->get('type') == 'user'){
            $template = "<b>You already logged in.</b>";
        } else {
            $template = file_get_contents(__DIR__ . '/../View/user_login.php');
        }
        return str_replace('%content%', $content, $template);
    }

    public function logout()
    {
        Core::getInstance()->Session->logout();
        Core::getInstance()->Session->set('login', null);
        Core::getInstance()->Session->set('type', null);
    }
}
