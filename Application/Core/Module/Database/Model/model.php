<?php

namespace Core\Module\Database;

use Core\Core;

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
     */
    public function __construct()
    {
        parent::__construct();
        $this->class = new MySQL_Database(Core::getInstance()->Config->mysql);
    }
}
