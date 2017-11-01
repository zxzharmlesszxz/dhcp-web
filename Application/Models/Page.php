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
        return $this->template;
    }
}