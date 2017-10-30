<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 14:24
 */

namespace Core\Interfaces;


/**
 * Interface ModelInterface
 * @package Core\Interfaces
 */
interface ModelInterface
{
    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function delete();

    /**
     * @return mixed
     */
    public function save();

    /**
     * @return mixed
     */
    public function create();
}