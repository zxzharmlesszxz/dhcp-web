<?php

namespace Module\Subnet;

/**
 * Class Model
 * @package Module\Subnet
 */
class Model extends \Core\Model
{
    protected $class;

    public function __construct()
    {
        parent::__construct();
        $this->class = new Subnet();
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
