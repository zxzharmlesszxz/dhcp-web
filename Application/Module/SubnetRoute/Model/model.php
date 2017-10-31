<?php

namespace Module\SubnetRoute;

/**
 * Class Model
 * @package Module\SubnetRoute
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
            $content['data'][] = array('id' => $item->id, 'subnet_id' => $item->subnet_id, 'gateway' => $item->gateway, 'mask' => $item->mask, 'destination' => $item->destination);
        }
        return $content;
    }

    /**
     * @param SubnetRoute $route
     * @return string
     */
    protected function str(SubnetRoute $route)
    {
        return "<tr><td>$route->id</td><td>$route->subnet_id</td><td>$route->gateway</td><td>$route->destination</td><td>$route->mask</td></tr>\n";
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        if (isset($query['ajax']) and $query['ajax'] == true) {
            return $this->ajax(SubnetRoute::find_all());
        } elseif (isset($query['id'])) {
            $data = $this->str(SubnetRoute::find_by_id(intval($query['id'])));
            $template = file_get_contents(__DIR__ . '/../View/route_show.php');
        } else {
            $template = file_get_contents(__DIR__ . '/../View/routes_view.php');
            $data = '';
            foreach (SubnetRoute::find_all() as $route) {
                $data .= $this->str($route);
            }
        }
        return str_replace('%content%', $data, $template);
    }
}
