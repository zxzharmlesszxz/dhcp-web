<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.11.17
 * Time: 18:03
 */

class Page
{
    private $template;

    public function __construct()
    {
        $this->template = file_get_contents(__DIR__ . "/../Views/index.tpl");
    }

    public function render()
    {
        global $config;
        $this->template = str_replace('%title%', $config['PROJECT_NAME'], $this->template);
        $this->template = str_replace('%copyright%', $config['PROJECT_NAME'], $this->template);
        $this->template = str_replace('%date%', date('Y'), $this->template);
        $this->template = str_replace('%menu%', "<nav id=\"menu\">\n
        <menu>\n
            <li class=\"active\"><a href=\"/\" title=\"Main\">Main</a></li>\n
            <li><a href=\"/subnets\" title=\"Subnets\">Servers</a></li>\n
            <li><a href=\"/routes\" title=\"Routes\">Contacts</a></li>\n
            <li><a href=\"/pools\" title=\"Pools\">Login</a></li>\n
        </menu>\n
        <br class=\"clearfix\">\n
    </nav>\n", $this->template);
        return $this->template;
    }
}