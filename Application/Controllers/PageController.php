<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 18:01
 */

include_once __DIR__ . "/../Models/Page.php";

class PageController
{
    public function actionIndex()
    {
        $item = new Page();
        print $item->render();
        return true;
    }
}
