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
     * @param Subnet $subnet
     * @return string
     */
    protected function str(Subnet $subnet)
    {
        return "<tr><td>$subnet->id</td><td>$subnet->gateway</td><td>$subnet->mask</td><td>$subnet->domain</td><td>$subnet->vlan_id</td><td>$subnet->type</td><td>$subnet->dns1</td><td>$subnet->dns2</td><td>$subnet->dhcp_lease_time</td><td>$subnet->dhcp_renewal</td><td>$subnet->dhcp_rebind_time</td></tr>\n";
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        if (isset($query['id'])) {
            $data = Subnet::find_by_id(intval($query['id']));
            $template = file_get_contents(__DIR__ . '/../View/subnet_show.php');
        } else {
            $template = file_get_contents(__DIR__ . '/../View/subnets_view.php');
            $data = Subnet::find_all();
        }
        if (isset($query['ajax']) and $query['ajax'] == true) {
            return $this->ajax($data);
        } else {
            if (is_array($data)){
                $str = '';
                foreach ($data as $subnet) {
                    $str .= $this->str($subnet);
                }
                $data = $str;
            } else {
                $data = $this->str($data);
            }
            return str_replace('%content%', $data, $template);
        }
    }
}
