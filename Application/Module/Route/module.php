<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Module;

use Core\Module;

require_once 'Controller/controller.php';
require_once 'Model/model.php';

/**
 * Class Route
 * @package Module
 */
class Route extends Module
{
    /**
     * SubnetRoute constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addRoute('delete');
        $this->addRoute('create');
        $this->addRoute('save');
        $this->addRoute('show');
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