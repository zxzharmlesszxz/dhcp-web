<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 14:14
 */

include_once __DIR__ . "/../Models/Route.php";

class RouteController
{
    public function actionIndex()
    {
        $items = Route::getItems();
        header('Content-type: application/json');
        print json_encode($items);
        return true;
    }

    public function actionView($id)
    {
        $item = Route::getItemById($id);
        header('Content-type: application/json');
        print json_encode($item);
        return true;
    }
}
