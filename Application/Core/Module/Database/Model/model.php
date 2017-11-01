<?php

namespace Core\Module\Database;

use Core\Core;
use Core\Module;

/**
 * Class Model
 * @package Core\Module\Database
 */
class Model extends \Core\Model
{
    /**
     * @var MySQL_Database
     */
    public $class;

    /**
     * Model constructor.
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        parent::__construct($module);
        $this->class = new MySQL_Database(Core::getInstance()->Config->mysql);
    }
}
