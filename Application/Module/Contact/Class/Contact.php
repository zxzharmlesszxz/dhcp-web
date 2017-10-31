<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11/1/17
 * Time: 01:26
 */

namespace Module\Contact;


use Core\Module\Database\DatabaseObject;

class Contact extends DatabaseObject
{
    public static function find_all()
    {
        return true;
    }
}