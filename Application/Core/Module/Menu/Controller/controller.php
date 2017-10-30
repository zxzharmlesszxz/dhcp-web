<?php

namespace Core\Module\Menu;

/**
 * Class Controller
 * @package Core\Module\Menu
 */
class Controller extends \Core\Controller
{
    public function add()
    {
        $this->Model->add(func_get_arg(0), func_get_arg(1), func_get_arg(2),func_get_arg(3));
    }
}
