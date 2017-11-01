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
        header('Content-type: text/html');
        $template = file_get_contents(__DIR__ . "/../Views/index.php");
        print $template;
        return true;
    }
}
