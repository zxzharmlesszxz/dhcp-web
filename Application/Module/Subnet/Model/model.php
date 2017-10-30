<?php

namespace Module\Subnet;

/**
 * Class Model
 * @package Module\Subnet
 */
class Model extends \Core\Model
{
    protected $class;

    public function __construct()
    {
        parent::__construct();
        $this->class = new Subnet();
    }

    public function get()
    {
        return $this->class->display();
    }
}
