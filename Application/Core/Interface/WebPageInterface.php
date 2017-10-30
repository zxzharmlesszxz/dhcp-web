<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 11:01
 */

namespace Core\Interfaces;

/**
 * Interface WebPageInterface
 * @package Core\Interfaces
 */
interface WebPageInterface
{
    /**
     * @param string $content
     * @return mixed
     */
    public function output(string $content);
}