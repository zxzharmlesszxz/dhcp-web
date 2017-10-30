<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 23.05.17
 * Time: 14:33
 */

namespace Core\Interfaces;

/**
 * Interface DataBaseInterface
 * @package Core\Interfaces
 */
interface DataBaseInterface
{
    /**
     * @return mixed
     */
    public function open_connection();

    /**
     * @return mixed
     */
    public function close_connection();

    /**
     * @param $sql
     * @return mixed
     */
    public function query($sql);

    /**
     * @param $value
     * @return mixed
     */
    public function escape_value($value);

    /**
     * @param $result_set
     * @return mixed
     */
    public function fetch_array($result_set);

    /**
     * @param $result_set
     * @return mixed
     */
    public function num_rows($result_set);

    /**
     * @return mixed
     */
    public function insert_id();

    /**
     * @return mixed
     */
    public function affected_rows();

    /**
     * @param $result
     * @return mixed
     */
    public function confirm_query($result);
}