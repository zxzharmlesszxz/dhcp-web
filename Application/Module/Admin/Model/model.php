<?php

namespace Module\Admin;

use Core\Core;

/**
 * Class Model
 * @package Module\Admin
 */
class Model extends \Core\Model
{

    /**
     * @param array $items
     * @return array
     */
    protected function ajax(array $items)
    {
        $content = array();
        foreach ($items as $item) {
            $content['data'][] = array('id' => $item->id, 'login' => $item->login, 'username' => $item->username, 'email' => $item->email, 'status' => $item->status);
        }
        return $content;
    }

    /**
     * @param array $items
     * @return string
     */
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
        $template = file_get_contents(__DIR__ . '/../View/admins_view.php');
        if (isset($query['ajax']) and $query['ajax'] == true) {
            return $this->ajax(Admin::find_all());
        } else {
            return str_replace('%content%', $this->str(Admin::find_all()), $template);
        }
    }

    /**
     * @return mixed
     */
    public function login()
    {
        $session = Core::getInstance()->Session;
        $query = func_get_arg(0)->getQuery();
        $content = "";
        if (!empty($query) && isset($query['login']) && isset($query['password'])) {
            $user = Admin::find_by_scope(array('login' => $query['login'], 'password' => md5($query['password'])))[0];
        }
        if (isset($user)) {
            $content = $user->login;
            $template = "<b>Welcome %content%.</b>";
            $session->login();
            $session->set('login', $user->login);
            $session->set('type', 'admin');
        } elseif ($session->check_login() and $session->get('type') == 'admin') {
            $template = "<b>You already logged in.</b>";
        } else {
            $template = file_get_contents(__DIR__ . '/../View/admin_login.php');
        }
        return str_replace('%content%', $content, $template);
    }

    /**
     *
     */
    public function logout()
    {
        Core::getInstance()->Session->logout();
        Core::getInstance()->Session->set('login', null);
        Core::getInstance()->Session->set('type', null);
    }

    /**
     * @return bool
     */
    public function create()
    {
        $query = func_get_arg(0)->getQuery()['admin'];
        $new = Admin::add($query);
        return $new->save();
    }

    public function changeStatus()
    {
        $query = func_get_arg(0)->getQuery()['id'];
        $new = Admin::find_by_id($query);
        return $new->changeStatus();
    }
}
