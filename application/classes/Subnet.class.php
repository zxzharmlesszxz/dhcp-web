<?php

/***
 * Subnet class
 ***/

class Subnet extends DatabaseObject
{
    protected static $table_name = "subnets";
    protected static $db_fields = array('subnet_id', 'dhcp_lease_time', 'dhcp_renewal', 'dhcp_rebind_time', 'mask', 'gateway', 'dns1', 'dns2', 'domain', 'vlan_id', 'type');

    public $subnet_id;
    public $dhcp_lease_time;
    public $dhcp_renewal;
    public $dhcp_rebind_time;
    public $mask;
    public $gateway;
    public $dns1;
    public $dns2;
    public $domain;
    public $vlan_id;
    public $type;

    public static function add($dhcp_lease_time, $dhcp_renewal, $dhcp_rebind_time, $mask, $gateway, $dns1, $dns2, $domain, $vlan_id, $type)
    {
        $new = new static;
        $new->dhcp_lease_time = trim($dhcp_lease_time);
        $new->dhcp_renewal = trim($dhcp_renewal);
        $new->dhcp_rebind_time = trim($dhcp_rebind_time);
        $new->mask = trim($mask);
        $new->gateway = trim($gateway);
        $new->dns1 = trim($dns1);
        $new->dns2 = trim($dns2);
        $new->domain = trim($domain);
        $new->vlan_id = trim($vlan_id);
        $new->type = trim($type);
        return $new;
    }
}
