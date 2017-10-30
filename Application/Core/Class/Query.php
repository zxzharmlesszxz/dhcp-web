<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 18.05.17
 * Time: 11:41
 */

namespace Core;


/**
 * Class Query
 * @package Core
 */
class Query
{
    /**
     * @var
     */
    protected $Query;

    /**
     * Query constructor.
     */
    public function __construct()
    {
        $this->Query = $_REQUEST;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->Query;
    }
}