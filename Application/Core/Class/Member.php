<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 12:31
 */

namespace Core;

use Core\Interfaces;
use Core\Module\Database\DatabaseObject;

/**
 * Class Member
 * @package Core
 */
abstract class Member extends DatabaseObject implements Interfaces\MemberInterface
{
    /**
     *
     */
    public function login()
    {
        // TODO: Implement login() method.
    }

    /**
     *
     */
    public function logout()
    {
        // TODO: Implement logout() method.
    }
}