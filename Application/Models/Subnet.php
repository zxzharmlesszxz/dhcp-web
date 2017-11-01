<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 15:36
 */

class Subnet
{
    public static function getItemById($id)
    {
        $result = Database::getConnection()->query("SELECT * FROM `subnets` WHERE `id` = '$id';");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }

    public static function getItems()
    {
        $result = Database::getConnection()->query("SELECT * FROM `subnets`;");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}