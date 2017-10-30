<?php

namespace Module\Example;

/**
 * Class Model
 * @package Module\Example
 */
class Model extends \Core\Model
{
    protected $class;

    public function __construct()
    {
        parent::__construct();
        $this->class = new Example();
    }

    public function get()
    {
        return $this->class->display();
    }
}
