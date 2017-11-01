<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 13:51
 */

return [
    'route/([0-9]+)' => 'route/view/$1',
    'subnet/([0-9]+)' => 'subnet/view/$1',
    'subnets' => 'subnet/index',
    'routes' => 'route/index'
];