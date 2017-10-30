<?php

namespace Module\Subnet;

use Core\Module\Database\DatabaseObject;

/**
 * Class Subnet
 * @package Module\Subnet
 */
class Subnet extends DatabaseObject
{
    /**
     * @var string
     */
    protected static $table_name = "subnets";
    /**
     * @var array
     */
    protected static $db_fields = array('subnet_id', 'dhcp_lease_time', 'dhcp_renewal', 'dhcp_rebind_time', 'mask',
        'gateway', 'dns1', 'dns2', 'domain', 'vlan_id', 'type');
    /**
     * @var
     */
    protected $subnet_id;
    /**
     * @var
     */
    protected $dhcp_lease_time;
    /**
     * @var
     */
    protected $dhcp_renewal;
    /**
     * @var
     */
    protected $dhcp_rebind_time;
    /**
     * @var
     */
    public $dns1;
    /**
     * @var
     */
    public $dns2;
    public $domain;
    public $gateway;
    public $mask;
    public $vlan_id;
    public $type;

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
