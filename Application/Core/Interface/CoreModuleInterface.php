<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 12:44
 */

namespace Core\Interfaces;

use Core\Core;

/**
 * Interface CoreModuleInterface
 * @package Core\Interfaces
 */
interface CoreModuleInterface
{
    /**
     * CoreModuleInterface constructor.
     * @param Core $core
     */
    public function __construct(Core $core);
}