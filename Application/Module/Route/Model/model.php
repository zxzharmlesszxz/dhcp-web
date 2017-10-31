<?php

namespace Module\Route;

/**
 * Class Model
 * @package Module\Route
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
     * @param Route $route
     * @return string
     */
    protected function str(Route $route)
    {
        return "<tr><td>$route->id</td><td>$route->subnet_id</td><td>$route->gateway</td><td>$route->destination</td><td>$route->mask</td></tr>\n";
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        if (isset($query['id'])) {
            $data = Route::find_by_id(intval($query['id']));
            $template = file_get_contents(__DIR__ . '/../View/route_show.php');
        } else {
            $template = file_get_contents(__DIR__ . '/../View/routes_view.php');
            $data = Route::find_all();
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
