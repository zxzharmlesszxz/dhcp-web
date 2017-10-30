<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 14:22
 */

namespace Core;


use Core\Interfaces\ControllerInterface;

/**
 * Class Controller
 * @package Core
 */
abstract class Controller implements ControllerInterface
{
    /**
     * @var Model
     */
    public $Model;

    /**
     * Controller constructor.
     */
    public function __construct(Model $model)
    {
        //echo get_called_class() . __METHOD__ . '<br>';
        $this->Model = $model;
    }

    /**
     * @param string $action
     * @param Query $query
     * @return mixed
     */
    public function action($action = 'get', Query $query)
    {
        //echo __METHOD__ . " doin $action<br>";
        return $this->Model->$action($query);
    }
}