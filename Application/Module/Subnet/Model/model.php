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
            $content['data'][] = array('id' => $item->id, 'serverName' => $item->servername, 'address' => $item->addr,
                'steam' => $item->steam, 'players' => $item->players, 'botNumber' => $item->botNumber, 'maxPlayers' => $item->maxplayers,
                'map' => $item->map, 'game' => $item->game, 'mode' => $item->mode, 'location' => $item->location,
                'regDate' => $item->regdate, 'site' => $item->site, 'status' => $item->status, 'vip' => $item->vip,
                'top' => $item->top);
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
            $content .= "<tr><td>$item->login</td><td>$item->username</td><td>$item->email</td><td>$item->status</td></tr>\n";
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
        } else {
            return str_replace('%content%', $this->str(Subnet::find_all()), $template);
        }
    }
}
