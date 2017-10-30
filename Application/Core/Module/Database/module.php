<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

use Core\CoreModule;

require_once 'Controller/controller.php';
require_once 'Model/model.php';
require_once 'Driver/MySQL/driver.php';

/**
 * Class Database
 * @package Core\Module\Database
 */
class Database extends CoreModule
{
    public function __get($key)
    {
        return $this->$key;
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