<?php

/**
 * Class Route
 */

namespace Core;

use Core\Interfaces\RouterInterface;
use Core\Interfaces\SingletonInterface;

/**
 * Class Router
 * @package Core
 */
class Router implements RouterInterface, SingletonInterface
{
    /**
     * @var
     */
    private static $instance = null;

    /**
     * @var Collection
     */
    protected $Routes;

    /**
     * @var Query
     */
    protected $Query;

    /**
     * Router constructor.
     */
    private function __construct()
    {
        $this->Routes = new Collection();
        $this->Query = new Query();
    }

    /**
     * @param $key
     * @return mixed|void
     */
    public function __get($key)
    {

    }

    /**
     * @return null
     */
    static public function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     *
     */
    public function __clone()
    {

    }

    /**
     *
     */
    public function __wakeup()
    {

    }

    /**
     * @param Route $route
     * @return mixed|void
     */
    public function setRoute(Route $route)
    {
        $this->Routes->addItem($route, "$route->Module/$route->Action");
    }

    /**
     * @param Route $route
     * @return mixed
     */
    public function getRoute(Route $route)
    {
        return ($this->Routes->keyExists("$route->Module/$route->Action")) ? $this->Routes->getItem("$route->Module/$route->Action") : false;
    }

    /**
     * @return Collection
     */
    public function getRoutes()
    {
        return $this->Routes;
    }

    /**
     * @param Core $core
     * @throws \Exception
     */
    public function startRouting(Core $core)
    {
        $route = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);
        $Module_name = (!empty($route[1]) ? $route[1] : 'example');
        $Action_name = (!empty($route[2]) ? $route[2] : 'get');
        $croute = $this->getRoute(new Route('Module\\' . ucfirst($Module_name), $Action_name));

        //$content = "Try to get route: /$Module_name/$Action_name<br>";
        if ($croute) {
            //$content .= "Module: $Module_name<br>";
            //$content .= "Action: $Action_name<br>";
            //$content .= "Query: ";
            //$content .=serialize($this->Query->getQuery());
            //$content .= "<br>";

            $module = $core->getModule(ucfirst($Module_name));
            $content = $module->action($Action_name, $this->Query);
            #$content .= serialize($module);
            $core->setContent($content);
        } else {
            throw new \Exception("Route /$Module_name/$Action_name: not found!");
        }
    }
}
