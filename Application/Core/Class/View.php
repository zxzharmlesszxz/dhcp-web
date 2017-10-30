<?php

namespace Core;

use Core\Interfaces\ViewInterface;

/**
 * Class View
 * @package Core
 */
class View implements ViewInterface
{
    /**
     * @param Theme $theme
     * @param $content
     * @return mixed
     */
    public function generate(Theme $theme, $content)
    {
        if (is_array($content)) {
            header('Content-type: application/json');
            return json_encode($content);
        }
        $page = file_get_contents(__DIR__ . "/../../Template/template_view.php");
        $lesses = $theme->getLesses();
        $csses = $theme->getStyles();
        $jses = $theme->getJscripts();
        $less_files = '';
        $css_files = '';
        $js_files = '';
        foreach ($lesses as $less) {
            $less_files .= "<link rel='stylesheet/less' type='text/css' href='$less'>\n";
        }
        foreach ($csses as $css) {
            $css_files .= "<link rel='stylesheet' type='text/css' href='$css'>\n";
        }
        foreach ($jses as $js) {
            $js_files .= "<script type='text/javascript' src='$js'></script>\n";
        }

        $menu = Core::getInstance()->getCoreModule('Menu');

        $menu->Controller->add('main', '/', 'Main', 'Main');
        $menu->Controller->add('servers', '/server', 'Servers', 'Servers');
        $menu->Controller->add('contacts', '/contact', 'Contacts', 'Contacts');

        if (Core::getInstance()->Session->get('type') == 'admin') {
            $menu->Controller->add('admins', '/admin', 'Admins', 'Admins');
            $menu->Controller->add('users', '/user', 'Users', 'Users');
            $menu->Controller->add('subnets', '/subnet', 'Subnets', 'Subnets');
            $menu->Controller->add('modes', '/mode', 'Modes', 'Modes');
            $menu->Controller->add('games', '/game', 'Games', 'Games');
        }

        if (Core::getInstance()->Session->get('logged_in') != null) {
            $menu->Controller->add('logout', '/' . Core::getInstance()->Session->get('type') . '/logout', 'Logout', 'Logout');
        } else {
            $menu->Controller->add('login', '/user/login', 'Login', 'Login');
        }

        $page = str_replace("%less%", $less_files, $page);
        $page = str_replace("%css%", $css_files, $page);
        $page = str_replace("%js%", $js_files, $page);
        $page = str_replace("%copyright%", Core::getInstance()->Config->PROJECT_NAME . " - " . Core::getInstance()->Config->PROJECT_VERSION, $page);
        $page = str_replace("%title%", Core::getInstance()->Config->PROJECT_NAME, $page);
        $page = str_replace("%date%", date("Y"), $page);
        $page = str_replace("%menu%", $menu->Controller->Model->show(), $page);
        $page = str_replace('%content%', $content, $page);
        return $page;
    }
}
