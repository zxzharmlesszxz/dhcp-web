<?php
/**
 * Created by PhpStorm.
 * User: (^_^)
 * Date: 07.05.2017
 * Time: 22:40
 */

namespace Core\Interfaces;

use Core\Theme;

/**
 * Interface ViewInterface
 * @package Core\Interfaces
 */
interface ViewInterface
{
    /**
     * @param Theme $theme
     * @param $content
     * @return mixed
     */
    public function generate(Theme $theme, $content);
}