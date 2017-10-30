<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 14:22
 */

namespace Core\Interfaces;
use Core\Route;

/**
 * Interface RouterInterface
 * @package Core\Interfaces
 */
interface RouterInterface
{
    /**
     * @param Route $route
     * @return mixed
     */
    public function getRoute(Route $route);

    /**
     * @param Route $route
     * @return mixed
     */
    public function setRoute(Route $route);
}