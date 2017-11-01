<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 18:03
 */

class Pool
{
    public static function getItemById($id)
    {
        $result = Database::getConnection()->query("SELECT * FROM `pools` WHERE `id` = '$id';");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }

    public static function getItems()
    {
        $result = Database::getConnection()->query("SELECT * FROM `pools`;");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}