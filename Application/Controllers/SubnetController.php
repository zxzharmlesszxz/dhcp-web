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
        $items = Subnet::getItems();
        header('Content-type: application/json');
        print '{"data": ';
        print json_encode($items);
        print '}';
        return true;
    }

    public function actionView($id)
    {
        $item = Subnet::getItemById($id);
        header('Content-type: application/json');
        print json_encode($item);
        return true;
    }
}
