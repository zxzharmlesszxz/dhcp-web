<?php

namespace Core\Module\Menu;

/**
 * Class Menu
 */
class Menu
{
    /**
     * @var array
     */
    protected $pages = Array();

    /**
     *
     */
    public function show()
    {
        $content = '';
        foreach ($this->pages as $page) {
            $content .= "<li><a href='{$page['url']}' title='{$page['description']}'>{$page['title']}</a></li>";
        }
        return $content;
    }

    /**
     * @param $name
     * @param $url
     * @param $title
     * @param string $description
     */
    public function add($name, $url, $title, $description = '')
    {
        $this->pages[$name]['url'] = $url;
        $this->pages[$name]['title'] = $title;
        $this->pages[$name]['description'] = $description;
        $this->pages[$name]['name'] = $name;
    }
}
