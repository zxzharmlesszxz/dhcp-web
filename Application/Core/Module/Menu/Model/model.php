<?php

namespace Core\Module\Menu;

/**
 * Class Model
 * @package Core\Module\Menu
 */
class Model extends \Core\Model
{
    /**
     * @var Menu
     */
    protected $Menu;

    /**
     * Menu constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->Menu = new Menu();
    }

    /**
     * @param $name
     * @param $url
     * @param $title
     * @param string $description
     */
    public function add($name, $url, $title, $description = '')
    {
        $this->Menu->add($name, $url, $title,$description);
    }

    /**
     * @return string
     */
    public function show()
    {
        return $this->Menu->show();
    }
}
