<?php

namespace Module\Subnet;

/**
 * Class Subnet
 * @package Module\Subnet
 */
class Subnet extends \Core\Module\Database\DatabaseObject
{
    /**
     * Example constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return bool|string
     */
    public function display()
    {
        return file_get_contents(__DIR__ . "/../View/main.php");
    }
}
