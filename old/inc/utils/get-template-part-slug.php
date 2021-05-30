<?php

function wpcs_get_template_part_slug($path)
{
    $path = preg_replace('/' . str_replace('/', '\/', WCPT_PATH_PARENT_THEME) . '/', '', $path);
    $path = preg_replace('/' . str_replace('/', '\/', WCPT_PATH_CURRENT_THEME) . '/', '', $path);

    $path = preg_replace('/\.' . WCPT_FILE_EXTENSION_PHP . '/', '', $path);

    return $path;
};
