<?php

if ( ! function_exists('can'))
{
    /**
     * Get the path to the application folder.
     *
     * @param $permission
     * @return bool
     */
    function can($permission)
    {
        return app('Rpgo\Rpgo')->can($permission);
    }
}