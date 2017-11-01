<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 14:14
 */

include_once __DIR__ . "/../Models/Subnet.php";

class SubnetController
{
    public function actionIndex()
    {
        echo "Subnets list";
        $items = Subnet::getItems();
        print_r($items);
        return true;
    }

    public function actionView($id)
    {
        echo "Subnet view id = $id";
        $item = Subnet::getItemById($id);
        print_r($item);
        return true;
    }
}