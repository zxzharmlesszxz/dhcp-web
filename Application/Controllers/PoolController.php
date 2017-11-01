<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 18:01
 */

include_once __DIR__ . "/../Models/Pool.php";

class PoolController
{
    public function actionIndex()
    {
        $items = Pool::getItems();
        header('Content-type: application/json');
        print json_encode($items);
        return true;
    }

    public function actionView($id)
    {
        $item = Pool::getItemById($id);
        header('Content-type: application/json');
        print json_encode($item);
        return true;
    }
}
