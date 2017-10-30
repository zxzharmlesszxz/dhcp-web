<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 12:16
 */

namespace Core\Interfaces;

/**
 * Interface MemberInterface
 * @package Core\Interfaces
 */
interface MemberInterface
{
    /**
     * @return mixed
     */
    public function login();

    /**
     * @return mixed
     */
    public function logout();
}