<?php

namespace Core;

use Core\Interfaces\ModelInterface;

/**
 * Class Model
 * @package Core
 */
abstract class Model implements ModelInterface
{
    protected $module;

    /**
     * Model constructor.
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        //echo get_called_class() . __METHOD__ . '<br>';
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function get()
    {
        $str = get_called_class() . __METHOD__ . '<br>';
        $str .= "Input args:<br>";
        $str .= serialize(func_get_args());
        return $str;
    }

    /**
     * @return string
     */
    public function save()
    {
        $str = get_called_class() . __METHOD__ . '<br>';
        $str .= "Input args:<br>";
        $str .= serialize(func_get_args());
        return $str;
    }

    /**
     * @return string
     */
    public function delete()
    {
        $str = get_called_class() . __METHOD__ . '<br>';
        $str .= "Input args:<br>";
        $str .= serialize(func_get_args());
        return $str;
    }

    /**
     * @return string
     */
    public function create()
    {
        $str = new \ReflectionClass(get_called_class());
        $str .= '<br>' . get_called_class() . __METHOD__ . '<br>';
        $str .= "Input args:<br>";
        $str .= serialize(func_get_args());
        return $str;
    }
}
