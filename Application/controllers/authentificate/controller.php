<?php

/**
 * Class Controller_Login
 */
class Controller_Login extends Controller
{
    /**
     *
     */
    public function action_login()
    {
        $data["login_status"] = "";
        if ($row->login == $this->query['login'] && $row->password == md5($this->query['password'])) {
            $data["login_status"] = "access_granted";
        } else {
            $data["login_status"] = "access_denied";
        }
        $this->view->generate('login_login.php', 'template_view.php', $data);
    }

    /**
     *
     */
    public function action_logout()
    {
        $data["login_status"] = "";
        $this->view->generate('login_logout.php', 'template_view.php');
    }

    /**
     *
     */
    public function action_index()
    {
        $data["login_status"] = "";
        $this->view->generate('login_view.php', 'template_view.php', $data);
    }
}
