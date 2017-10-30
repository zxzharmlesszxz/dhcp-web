<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 18:02
 */

namespace Core\Interfaces;

/**
 * Interface SingletonInterface
 * @package Core\Interfaces
 */
interface SingletonInterface
{
    /**
     * @param $key
     * @return mixed
     */
    public function __get($key);

    /**
     * @return mixed
     */
    public function __clone();

    /**
     * @return mixed
     */
    public function __wakeup();

    /**
     * @return mixed
     */
    static public function getInstance();
}