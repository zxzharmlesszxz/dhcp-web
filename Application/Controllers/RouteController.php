<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 14:14
 */

class RouteController
{
    public function actionIndex()
    {
        echo "Routes list";
        return true;
    }

    public function actionView($id)
    {
        echo "Route view id = $id";
        return true;
    }
}