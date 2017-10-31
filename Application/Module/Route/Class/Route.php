<?php

namespace Module\Route;

use Core\Module\Database\DatabaseObject;

/**
 * Class Route
 * @package Module\Route
 */
class Route extends DatabaseObject
{
    /**
     * @var string
     */
    protected static $table_name = "subnet_routes";

    /**
     * @var array
     */
    protected static $db_fields = array('id', 'subnet_id', 'destination', 'mask', 'gateway');

    /**
     * @var
     */
    protected $id;
    public $subnet_id;
    public $destination;
    public $gateway;
    public $mask;

    /**
     * @param array $item
     * @return static
     */
    public static function add(array $item)
    {
        $new = new static;
        foreach ($item as $key => $value) {
            $new->$key = trim($value);
        }
        return $new;
    }
}
