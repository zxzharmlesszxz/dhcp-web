<?php

namespace Module\Subnet;

/**
 * Class Model
 * @package Module\Subnet
 */
class Model extends \Core\Model
{
    /**
     * @param array $items
     * @return array
     */
    protected function ajax(array $items)
    {
        $content = array();
        foreach ($items as $item) {
            $content['data'][] = array('id' => $item->id, 'domain' => $item->domain, 'gateway' => $item->gateway,
                'type' => $item->type, 'vlan_id' => $item->vlan_id, 'mask' => $item->mask, 'dns1' => $item->dns1,
                'dns2' => $item->dns2, 'dhcp_lease_time' => $item->dhcp_lease_time, 'dhcp_renewal' => $item->dhcp_renewal,
                'dhcp_rebind_time' => $item->dhcp_rebind_time);
        }
        return $content;
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        if (!empty($query)) {
            $data = Subnet::find_by_scope($query);
        } else {
            $data = Subnet::find_all();
        }

        return $this->ajax(!empty($data) ? $data : array() );
    }
}
