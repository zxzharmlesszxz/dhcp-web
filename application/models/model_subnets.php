<?php

class Model_Subnets extends Model
{

    public function get_data()
    {
        $items = new Collection;
        foreach (Subnet::find_all() as $subnet) {
            $items->addItem($subnet, $subnet->subnet_id);
        }
        return $items;
    }

    public function get($id)
    {
        return $this->get_data()->getItem($id);
    }

    public function save(Subnet $subnet)
    {
        return $subnet->save() ? $subnet : false;
    }

    public function create(array $subnet)
    {
        $subnet = Subnet::add($subnet['dhcp_lease_time'], $subnet['dhcp_renewal'], $subnet['dhcp_rebind_time'], $subnet['mask'], $subnet['gateway'], $subnet['dns1'], $subnet['dns2'], $subnet['domain'], $subnet['vlan_id'], $subnet['type']);
        return $subnet->save() ? $subnet : false;
    }

    public function delete($id)
    {
        return $this->get_data()->getItem($id)->delete();
    }

    public function update(array $subnet)
    {
        foreach ($subnet as $key => $value) {
            $subnet[$key] = trim($value);
        }
        $item = $this->get_data()->getItem($subnet['subnet_id']);
        unset($subnet['subnet_id']);
        if (!$item) {
            return FALSE;
        }
        foreach ($subnet as $key => $value) {
            $item->$key = $value;
        }
        return $item->save() ? $item : false;
    }
}
