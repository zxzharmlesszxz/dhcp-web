<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 11:14
 */

namespace Core;

use Core\Interfaces\CoreModuleInterface;

/**
 * Class CoreModule
 * @package Core
 */
abstract class CoreModule implements CoreModuleInterface
{
    /**
     * @var
     */
    protected $Controller;

    /**
     * CoreModule constructor.
     * @param Core $core
     */
    public function __construct(Core $core)
    {
        $controller = get_called_class() . '\Controller';
        $model = get_called_class() . '\Model';
        $this->Controller = new $controller(new $model($this));
    }

}