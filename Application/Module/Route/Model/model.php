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
        $content = ['data' => []];
        foreach ($items as $item) {
            $content['data'][] = array('id' => $item->id, 'subnet_id' => $item->subnet_id, 'gateway' => $item->gateway, 'mask' => $item->mask, 'destination' => $item->destination);
        }
        return $content;
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        $class = get_called_class();

        if (!empty($query)) {
            $data = Route::find_by_scope($query);
        } else {
            $data = Route::find_all();
        }

        return $this->ajax(!empty($data) ? $data : array() );
    }
}
