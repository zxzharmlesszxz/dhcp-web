<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 14:14
 */

class SubnetController
{
    public function actionIndex()
    {
        echo "Subnets list";
        return true;
    }

    public function actionView()
    {
        echo "Subnet view";
        return true;
    }
}