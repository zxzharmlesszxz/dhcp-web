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
        $page = file_get_contents(__DIR__ . "/../Views/Pool/index.php");
        $page = str_replace('%content%', json_encode($items), $page);
        print $page;
        return true;
    }

    public function actionView($id)
    {
        $item = Pool::getItemById($id);
        $page = file_get_contents(__DIR__ . "/../Views/Pool/index.php");
        $page = str_replace('%content%', json_encode($item), $page);
        print $page;
        return true;
    }
}
