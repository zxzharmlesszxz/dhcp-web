<?php

/**
 * @return mixed
 */
function db()
{
    return \Core\Core::getInstance()->getCoreModule('Database')->Controller->Model->class;
}
