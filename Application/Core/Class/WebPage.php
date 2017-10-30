<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 18.05.17
 * Time: 13:36
 */

namespace Core;


use Core\Interfaces\WebPageInterface;

/**
 * Class WebPage
 * @package Core
 */
abstract class WebPage implements WebPageInterface
{
    /**
     * @param string $content
     * @return mixed|void
     */
    public function output(string $content)
    {
        echo $content;
    }

}