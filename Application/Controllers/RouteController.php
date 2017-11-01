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
        echo "Routes list";
        $items = Route::getItems();
        print_r($items);
        return true;
    }

    public function actionView($id)
    {
        echo "Route view id = $id";
        $item = Route::getItemById($id);
        print_r($item);
        return true;
    }
}