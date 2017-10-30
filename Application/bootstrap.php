<?php

namespace Core;

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';

/**
 * @param $class
 */
function __autoload($class)
{
    @include_once __DIR__ . "/classes/${class}.class.php";
}

$core = Core::getInstance()->init();

$modulesDir = dir($core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH);

while (false !== ($module = $modulesDir->read())) {
    switch ($module) {
        case '.':
        case '..':
            break;
        default:
            //var_dump($module);
            include_once $core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH . '/' . $module . '/module.php';
            $moduleName = "Module\\$module";
            $core->registerModule($module, new $moduleName);
            break;
    }
}

$core->run();
$core->Session->set('Theme', $core->Config->THEME);
$core->Theme->generate($core->content);

//var_dump($core->Theme);
//var_dump($core->content);
//var_dump($core->Router->getRoutes());