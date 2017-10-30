<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

use Core\Core;
use Core\CoreModule;

require_once 'Controller/controller.php';
require_once 'Model/model.php';

/**
 * Class Session
 * @package Core\Module\Session
 */
class Session extends CoreModule
{
    /**
     * @var Session\Session
     */
    public $Session;

    /**
     * @var
     */
    public $message;

    /**
     * Session constructor.
     * @param Core $core
     */
    public function __construct(Core $core)
    {
        parent::__construct($core);
        $this->Session = new Session\Session();
    }

    /**
     * @param string $msg
     */
    public function message($msg = '')
    {
        $this->set('message', $msg);
    }

    /**
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->get('logged_in');
    }

    /**
     *
     */
    public function check_login()
    {
        return $this->get('logged_in');
    }

    /**
     *
     */
    public function check_message()
    {
        $message = $this->get('message');
        if ($message)
            $this->message = $message;
        $this->set('message', '');
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->Session->set($key, $value);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->Session->get($key);
    }

    /**
     *
     */
    public function login()
    {
        $this->set('logged_in', true);
    }

    /**
     *
     */
    public function logout()
    {
        $this->set('logged_in', null);
    }
}

spl_autoload_register(
/**
 * @param $class
 */
    function ($class) {
        $hierarchy = explode('\\', $class);
        @include_once __DIR__ . '/Class/' . end($hierarchy) . '.php';
    });
