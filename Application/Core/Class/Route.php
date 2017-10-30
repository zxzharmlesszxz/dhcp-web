<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 10:42
 */

namespace Core;

/**
 * Class Route
 * @package Core
 */
class Route
{
    /**
     * @var
     */
    public $Module;

    /**
     * @var
     */
    public $Action;

    /**
     * Route constructor.
     * @param $Module
     * @param $Action
     */
    public function __construct($Module, $Action)
    {
        $this->Module = $Module;
        $this->Action = $Action;
    }
}