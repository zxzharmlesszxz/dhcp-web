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
        $page = file_get_contents(__DIR__ . "/../Views/Route/index.php");
        $page = str_replace('%content%', json_encode($items), $page);
        print $page;
        return true;
    }

    public function actionView($id)
    {
        $item = Route::getItemById($id);
        $page = file_get_contents(__DIR__ . "/../Views/Route/index.php");
        $page = str_replace('%content%', json_encode($item), $page);
        print $page;
        return true;
    }
}