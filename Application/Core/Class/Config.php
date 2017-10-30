<?php

/**
 * Class Config
 */

namespace Core;
use Core\Interfaces\SingletonInterface;

/**
 * Class Config
 * @package Core
 */
final class Config implements SingletonInterface
{
    /**
     * @var
     */
    private static $instance = null;

    /**
     * @var
     */
    private $_configuration;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $this->loadConfigFile();
    }

    /**
     * @param $key
     * @return null
     */
    final public function __get($key)
    {
        return isset($this->_configuration[$key]) ? $this->_configuration[$key] : NULL;
    }

    /**
     *
     */
    public function __clone()
    {
    }

    /**
     *
     */
    public function __wakeup()
    {
    }

    /**
     * @return Config
     */
    static public function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     *
     */
    private function loadConfigFile()
    {
        include_once(__DIR__ . '/../../config/config.inc.php');
        $this->_configuration = $config;
    }
}
