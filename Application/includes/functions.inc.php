<?php

/**
 * @param null $servergame
 * @return string
 */

function db()
{
    return \Core\Core::getInstance()->getCoreModule('Database')->Controller->Model->class;
}
