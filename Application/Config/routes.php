<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 13:51
 */

return [
    'route/([a-z]+)/([0-9]+)' => 'route/$1/$2',
    'subnet/([a-z]+)/([0-9]+)' => 'subnet/$1/$2',
    'subnets' => 'subnet/index',
    'routes' => 'route/index'
];