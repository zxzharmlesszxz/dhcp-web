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
    protected static $table_name = "subnet";

    /**
     * @var array
     */
    protected static $db_fields = array('id', 'dhcp_lease_time', 'dhcp_renewal', 'dhcp_rebind_time', 'mask',
        'gateway', 'dns1', 'dns2', 'domain', 'vlan_id', 'type');

    /**
     * @var
     */
    protected $id;
    public $dhcp_lease_time;
    public $dhcp_renewal;
    public $dhcp_rebind_time;
    public $dns1;
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
