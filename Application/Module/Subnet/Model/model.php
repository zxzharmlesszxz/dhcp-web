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
     * @param array $items
     * @return string
     */
    protected function str(array $items)
    {
        $content = "";
        foreach ($items as $item) {
            $content .= "<tr><td>$item->id</td><td>$item->domain</td><td>$item->gateway</td><td>$item->vlan_id</td></tr>\n";
        }
        return $content;
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        $template = file_get_contents(__DIR__ . '/../View/subnets_view.php');
        if (isset($query['ajax']) and $query['ajax'] == true) {
            return $this->ajax(Subnet::find_all());
        } elseif (isset($query['id'])) {
            return $this->show(Subnet::find_by_id(intval($query['id'])));
        } else {
            return str_replace('%content%', $this->str(Subnet::find_all()), $template);
        }
    }

    protected function show(Subnet $subnet)
    {
        $template = file_get_contents(__DIR__ . '/../View/subnet_show.php');
        return str_replace('%content%', $subnet->domain . $subnet->gateway, $template);
    }
}
