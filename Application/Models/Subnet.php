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
        $db = new PDO("mysql:host=localhost;dbname=dhcpd", "dhcpd", "dhcpd");
        $result = $db->query("SELECT * FROM `subnets` WHERE `id` = '$id';");
        return $result->fetch();
    }

    public static function getItems()
    {
        $db = new PDO("mysql:host=localhost;dbname=dhcpd", "dhcpd", "dhcpd");
        $result = $db->query("SELECT * FROM `subnets`;");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}