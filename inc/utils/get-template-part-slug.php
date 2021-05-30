<?php

function vwpt_get_template_part_slug($path)
{
    $path = preg_replace('/' . str_replace('/', '\/', VWPT_PATH_PARENT_THEME) . '/', '', $path);
    $path = preg_replace('/' . str_replace('/', '\/', VWPT_PATH_CURRENT_THEME) . '/', '', $path);

    $path = preg_replace('/\.' . VWPT_FILE_EXTENSION_PHP . '/', '', $path);

    return $path;
};
