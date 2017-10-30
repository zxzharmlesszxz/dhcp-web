<?php

namespace Module\Example;

/**
 * Class Example
 * @package Module\Example
 */
class Example
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
