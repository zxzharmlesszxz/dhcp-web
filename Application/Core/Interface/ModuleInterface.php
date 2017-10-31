<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 12:44
 */

namespace Core\Interfaces;

/**
 * Interface ModuleInterface
 * @package Core\Interfaces
 */
interface ModuleInterface
{
    /**
     * @param $Action
     * @return mixed|void
     */
    public function addRoute(string $Action);

    /**
     * @return mixed
     */
    public function getItems();

    /**
     * @param array $scope
     * @return mixed
     */
    public function getItem(array $scope);

}