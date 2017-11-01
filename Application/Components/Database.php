<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 15:57
 */

class Database
{
    public static function getConnection()
    {
        $params = include_once __DIR__ . "/../Config/db_params.php";
        $type = array_keys($params)[0];
        $db = new PDO("$type:host=$params[$type]['host'];dbname=$params[$type]['dababase'];charset=$params[$type]['charset']",
            $params[$type]['user'], $params[$type]['password']);
        return $db;
    }

}