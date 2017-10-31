<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 11:14
 */

namespace Core;

use Core\Interfaces\ModuleInterface;

/**
 * Class Module
 * @package Core
 */
abstract class Module implements ModuleInterface
{
    /**
     * @var
     */
    protected $Controller;

    protected $items;

    /**
     * Module constructor.
     */
    public function __construct()
    {
        $controller = get_called_class() . '\Controller';
        $model = get_called_class() . '\Model';
        $this->Controller = new $controller(new $model);
        $this->addRoute('get');
        $this->items = new Collection();
        foreach ((get_called_class() . '\\' . explode('\\', get_called_class())[1])::find_all() as $item) {
            $this->items->addItem($item);
        }
    }

    /**
     * @param $Action
     * @return mixed|void
     */
    public function addRoute(string $Action)
    {
        //echo get_called_class() . __METHOD__ . '<br>';
        Core::getInstance()->Router->setRoute(new Route(get_called_class(), $Action));
    }

    /**
     * @param $action
     * @param $query
     * @return mixed
     */
    public function action($action, Query $query)
    {
        return $this->Controller->action($action, $query);
    }

    /**
     * @param array $scope
     * @return mixed|void
     */
    public function getItem(array $scope)
    {
        // TODO: Implement getItem() method.
    }

    /**
     * @return Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}